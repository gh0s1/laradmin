<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Category;
use App\Content;

class ContentController extends Controller
{
    //添加内容
    public function add(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->input('info');
            //查询类别
            $catinfo = Category::where("catid",$data['catid'])->first();
            $data['author'] = $request->session()->get('user')->name;
            $data['type'] = $catinfo->type;
            if(Content::create($data))
            {
                return redirect('admin/content/add')->with('success','添加成功!');
            }
        }
        $cates = $this->getCatetree(0,-1);
    	return view("admin.content.add",['cates'=>$cates]);
    }


    //内容修改
    public function modify(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->input('info');
            $data['updated_at'] = time();
            $info = Content::find($data['id']);
            $info->title = $data['title'];
            $info->description = $data['description'];
            $info->content = $data['content'];
            $info->updated_at = time();
            if($info->save())
            {
                return redirect()->back()->with('success','修改成功!');
            }
        }

        $id = $request->input("id");
        $data = Content::where("id",$id)->first();
        $cates = $this->getCatetree(0,-1);
        return view("admin.content.add",['cates'=>$cates,'data'=>$data]);
    }


    //内容删除
    public function deletecontent(Request $request)
    {
        $id = $request->input('id');
        if(Content::where('id',$id)->delete())
        {
            return redirect('admin/content/lists/contents')->with('success','删除成功!');
        }
    }


    public function lists($types)
    {
    	if($types == 'contents') 
    	{
            $data = Content::orderBy('updated_at','desc')->paginate(2);
    		return view('admin.content.contents_list',['data'=>$data]);
    	}

    	if($types == 'comments')
    	{
    		return view('admin.content.comments_list');
    	}
    }


    public function cate(Request $request,$action = null)
    {
        if($action == 'add')
        {
            return $this->adds($request);
        }

        $cates = $this->getCatetree(0,-1);
        $data = $this->getTreeData(0);
        
        return view('admin.content.cateIndex',['data'=>$data,'cates'=>$cates]);
    }


    public function addcate(Request $request)
    {
        $cateobj = new Category();
        if($request->isMethod('POST'))
        {
            $data = $request->input('info');
            $validator = \Validator::make
            (
                $request->all(),
                [
                    'info.catname' => 'required|min:2|max:15',
                    'info.dirname'  => 'required|min:2|max:20'
                ],
                
                [
                    'required' => ':attribute 必填选项',
                    'info.catname.min' => ':attribute 最小2个字符',
                    'info.catname.max' => ':attribute 最大5个字符',
                    'info.dirname.min'  => ':attribute 最小2个字符',
                    'info.dirname.max'  => ':attribute 最大20个字符'
                ],
                
                [
                    'info.catname' => '栏目名称',
                    'info.dirname' => '英文目录'
                ]
            );
            if($validator->fails())
            {
                //withInput()方法实现数据保持
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['created_at'] = time();
            $data['updated_at'] = time();
        
            if($data['parentid'] == 0 && $cateobj->create($data))
            {
                return redirect('admin/content/cate/addcate')->with('success','添加成功!');
            }

            if($data['parentid'] != 0)
            {
                $catid = Category::insertGetId([
                    'parentid' => $data['parentid'],
                    'type' => $data['type'],
                    'catname' => $data['catname'],
                    'dirname' => $data['dirname'],
                    'created_at' => time(),
                    'updated_at' => time()
                ]);

                //更新父级栏目childs字段
                $parentinfo = Category::where('catid',$data['parentid'])->first();
                //首次插入
                if($parentinfo->childs == null)
                {
                    if($parentinfo->where('catid',$data['parentid'])->update(['childs' => strval($catid)]))
                    {
                        return redirect('admin/content/cate/addcate')->with('success','添加成功!');
                    }
                }
                else
                {
                    $arrchild = str_split($parentinfo->childs);
                    array_push($arrchild,$catid);
                    if($parentinfo->where('catid',$data['parentid'])->update(['childs' => implode(',',$arrchild)]))
                    {
                         return redirect('admin/content/cate/addcate')->with('success','添加成功!');
                    }
                }
                
            }

        }
        //查询现有栏目
        //$cates = $cateobj->all();
        $cates = $this->getCatetree(0,-1);
        //dd($cates);
        return view('admin.content.addcate',['cates' => $cates]);
    }



    public function modifycate(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->input('info');
            $data['updated_at'] = time();
            $catid = $data['catid'];
            $catinfo = Category::where('catid',$catid)->first();
            if($catinfo->parentid == 0)
            {
                return redirect('admin/content/cate')->with('error','不能移动顶层栏目！');
            }

            //如果发生栏目移动
            if($catinfo->parentid != $data['parentid'])
            {
                //删除原先父级栏目中的信息
                $old_parentinfo = Category::where('catid',$catinfo->parentid)->first();
                $old_parent_childs = explode(',',$old_parentinfo->childs);
                $child_key = array_keys($old_parent_childs,strval($catid))[0];
                unset($old_parent_childs[$child_key]);
                //dd($old_parent_childs);
                if($old_parentinfo->where('catid',$catinfo->parentid)->update(['childs' => implode(',',$old_parent_childs),'updated_at' => time()]))
                {
                    //更新栏目parentid字段信息 
                    if($catinfo->where('catid',$catid)->update($data))
                    {
                        //更新新父级栏目childs字符信息
                        $new_parentinfo = Category::where('catid',$data['parentid'])->first();
                        trim($new_parentinfo->childs,',');
                        $new_parent_childs = explode(',',$new_parentinfo->childs);
                        foreach ($new_parent_childs as $key => $value) 
                        {
                            if($value == NULL || $value="")
                            {
                                unset($new_parent_childs[$key]);
                            }    
                        }
                        array_push($new_parent_childs,strval($catid));
                        //dd($new_parent_childs);
                        if($new_parentinfo->where('catid',$data['parentid'])->update(['childs'=>implode(',', $new_parent_childs),'updated_at'=>time()]))
                        {
                            return redirect('admin/content/cate')->with('success','修改成功!');
                        }
                    }
                }
            }
            else //没有发生栏目移动
            {
                if($catinfo->where('catid',$catid)->update($data))
                {
                    return redirect('admin/content/cate')->with('success','修改成功!');
                }
            }
        }
    }



    public function deletecate($catid)
    {

        //如果有子栏目则连同子栏目一起删除
        $catinfo = Category::where('catid',$catid)->first();

        if($catinfo)
        {
            //更新父级栏目childs字段
            if($catinfo->parentid == 0)
            {
                $parentinfo = $catinfo;
            }
            else
            {
                $parentinfo = Category::where('catid',$catinfo->parentid)->first();
            }
            if($catinfo->parentid != 0)
            {
                $parentchilds = explode(',',$parentinfo->childs);
                $key = array_keys($parentchilds,$catid)[0];
                unset($parentchilds[$key]);
                $parentinfo->where('catid',$catinfo->parentid)->update(['childs'=>implode(',',$parentchilds),'updated_at'=>time()]);
            }
            $catchilds = explode(',',$catinfo->childs);
            foreach ($catchilds as $value) 
            {
                $this->deletecate($value);
                $catinfo->where('catid',$catid)->delete();
            }
        }

        return redirect('admin/content/cate')->with("success","删除成功");

    }



    public function getCatetree($parentid,$t)
    {
        $t++;
        global $tree;
        $childcates = Category::where('parentid',$parentid)->get();
        if($childcates)
        {
            foreach ($childcates as $val) 
            {
                if($t != 0)
                {
                     $val->catname = str_repeat("&nbsp;", $t*4).'|--'.$val->catname;
                }
                $tree[] = $val;
                $this->getCatetree($val->catid,$t);
            }
        }

        return $tree;
    }


    public function getTreeData($parentid)
    {
        $data = ""; 
        $cates = Category::where('parentid',$parentid)->get();
        if($cates)
        {
            foreach($cates as $val)
            {
                $textdata  = "<div class='col-lg-4' style='margin-left:-25px;'>$val->catid</div>";
                if($val->type == 'cate')
                {
                    $textdata .= "<div class='col-lg-4' style='margin-left:-40px;'>栏目</div>";
                }
                else
                {
                    $textdata .= "<div class='col-lg-4' style='margin-left:-40px;'>单页</div>";
                }
                $textdata .= "<div class='col-lg-4' style='margin-left:45px;'>";
                $textdata .= "<a href='".url('admin/content/cate/addcate?catid='.$val->catid)."'>添加子栏目</a> | ";
                $textdata .= "<a href='javascript:void(0)' data-toggle='modal' data-target='#myModal_".strval($val->catid)."'>修改</a> | "; 
                $textdata .= "<a href='".url('admin/content/cate/deletecate/'.$val->catid)."'>删除</a>";
                $textdata .= "</div>";

                $data .= "{";
                $data .= "text:'".$val->catname."',";
                if($parentid == 0)
                {
                    $data .= "selectable:true,";
                    $data .= "state: 
                             {
                                checked: false,
                                expanded: false,
                                selected: false
                             },";
                }
                $data .=  "tags : [\"$textdata\"],";
                if($val->childs != null)
                {
                    $data .= "nodes:[";
                    $data .= $this->getTreeData($val->catid);
                    $data .= "]";
                }
                $data .= "},";
            }
        }
        return $data;
    }

}
