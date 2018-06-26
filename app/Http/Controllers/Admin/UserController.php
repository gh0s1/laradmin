<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function add(Request $request)
    {

    	if($request->isMethod("POST"))
    	{

    		//控制器验证
    		/*
    		$this->validate
    		(
    			$request,
	    		[

	    			'User.name' => 'required|min:3|max:15',
	    			'User.email' => 'required',
	    			'User.password' => 'required'	
	    		],

	    		[
	    			'required' => ':attribute 为必填项',
	    			'min' => ':attribute 最小3个字符',
	    			'max' => ':attribute 最大15个字符' 
	    		],

	    		[
	    			'User.name' => '用户名',
	    			'User.email' => '邮箱',
	    			'User.password' => '密码'
	    		]
    		);
			*/

    		//Validator类验证
    		$validator = \Validator::make
    		(
    			$request->all(),

    			[

	    			'User.name' => 'required|min:3|max:15',
	    			'User.email' => 'required',
	    			'User.password' => 'required|min:6|max:20'	
	    		],

	    		[
	    			'required' => ':attribute 为必填项',
	    			'User.name.min' => ':attribute 最小3个字符',
	    			'User.name.max' => ':attribute 最大15个字符',
	    			'User.password.min' => ':attribute 最小6个字符',
	    			'User.password.max' => ':attribute 最大20个字符',
	    		],

	    		[
	    			'User.name' => '用户名',
	    			'User.email' => '邮箱',
	    			'User.password' => '密码'
	    		]
    		);


    		if($validator->fails())
    		{
    			//withInput()方法实现数据保持
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		$data = $request->input("User");
    		$data['password'] = bcrypt($data['password']);
    		$user = new Admin();
    		/*
    		$user->name = $data['name'];
    		$user->email = $data['email'];
    		$password = bcrypt($data['password']);
			*/

    		if($user->create($data))
    		{
    			return redirect('admin/user/add')->with('success','添加成功!');
    		}
    		else
    		{
    			return redirect()->back();
    		} 

    	}
    	return view("admin.user.add");
    }

    public function lists()
    {
    	$data = Admin::select('id','name','email','created_at')->paginate(1);
    	return view("admin.user.lists",['data' => $data]);
    }



    public function modify(Request $request)
    {
    	if($request->isMethod("POST"))
    	{
    		$data = $request->input('User');
    		$id = $data['id'];

            $admin = Admin::find($id);
            $admin->name = $data['name'];
            $admin->email = $data['email'];

            //$admin->created_at = time();
            $admin->updated_at = time();

            if($data['password'] != '')
            {
                $admin->password = bcrypt($data['password']);
            }

            if($admin->save())
            {
                return redirect()->back()->with('success','修改成功!');
            }

    	}
    }

    public function deleteUser($id = null)
    {
        $admin = Admin::find($id);

        if($admin->delete())
        {
            return redirect('admin/user/lists');
        }
    }
}
