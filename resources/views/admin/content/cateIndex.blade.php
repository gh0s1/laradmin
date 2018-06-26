@extends('admin.common.layouts')

@section('title')
	管理栏目
@stop

@section('style')
    <style>
        .items
        {
            float:left;
            border:0px;
        }

        .cate
        {
            list-style: none;
        }

        .badge
        {
            width:80%;
            background: white;
            border-radius: 0px;
        }
    </style>
@stop

@section("info")
	管理栏目
@stop


@section('cate_info')
@include('admin.common.catenav')
@stop


@section('content')
    @include('admin.common.message')
    <table class="table" style="background: white">
      <thead>
        <tr>
          <th>栏目名称</th>
          <th>catid</th>
          <th>栏目类型</th>
          <th>操作</th>
        </tr>
      </thead>
    </table>

    <div style="background: white">
        <div id="treeview"></div>
    </div>
@stop


@if($cates)
@section('modals')
    <!-- 模态框（Modal） -->
    @foreach($cates as $val)
      <div class="modal fade" id="myModal_{{$val->catid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">栏目信息修改</h4>
                  </div>
                  
                  <div class="modal-body">
                      <form class="form-horizontal" role="form" id="form_{{$val->catid}}" method="post" action="{{ url('admin/content/cate/modifycate') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="info[catid]" value="{{ $val->catid}}">
                            <div class="form-group">
                              <label for="firstname" class="col-sm-2 control-label">栏目名称</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="catname" name="info[catname]" value="{{preg_replace('/(\&nbsp\;)*(\|\-\-){1}/','', $val->catname)}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">上级栏目</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="parentid" name='info[parentid]'>
                                    <option value="0" {{$val->parentid == 0 ? 'selected' : 'false'}}>
                                        作为一级栏目
                                    </option>
                                    @foreach($cates as $value)
                                      <option value='{{$value->catid}}'
                                        {{$val->parentid == $value->catid ? 'selected' : 'false'}}
                                      >
                                        {{$value->catname}}
                                      </option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">英文目录</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="dirname" name="info[dirname]" value="{{$val->dirname}}">
                              </div>
                            </div>
                      </form>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                      <button type="button" class="btn btn-primary" 
                        onclick="modify({{$val->catid}},{{$val->parentid}},'{{$val->catname}}','{{$val->dirname}}')">
                        提交更改
                      </button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
    @endforeach
@stop
@endif


@section("js")
<script src="{{ asset('static/js/bootstrap-treeview.js') }}"></script>

<script>

    var data = [{!! $data !!}];
    function getTree() {
        return data;
    }
 
    $('#treeview').treeview({
        data: getTree(),
        showTags : true,
        onhoverColor : 'white',
        selectedBackColor : 'white',
        selectedColor : 'black',
        enableLinks : true
    }); 



    function modify(catid,parentid,catname,dirname)
    {
        var frm = "#form_"+catid;
        //如果没有任何变化  单击提交按钮 则保持不动

        var re_catname  = $("#catname").val();
        var re_dirname  = $("#dirname").val();
        var re_parentid = $("#parentid").val();
  
        if(re_catname == catname && re_dirname == dirname && re_parentid == parentid)
        {
          return;
        }

        $(frm).submit();
    } 

</script>

@stop