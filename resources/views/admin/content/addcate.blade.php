@extends('admin.common.layouts')

@section('title')
	添加栏目
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
    </style>
@stop

@section("info")
	添加栏目
@stop


@section('cate_info')
@include('admin.common.catenav')
@stop


@section('content')
	@include('admin.common.validate')
	@include('admin.common.message')
 	<form class="form-horizontal" role="form" style="width: 50%" method="post" 
 		action="{{ url('admin/content/cate/addcate') }}">
 		{{ csrf_field() }}
	      <div class="form-group">
	        <label for="firstname" class="col-sm-2 control-label">上级栏目</label>
	        <div class="col-sm-10">
	              <select class="form-control" name='info[parentid]'>
	                <option value='0' {{ !Request::input('catid') ? 'selected=true': 'false' }}>作为一级栏目</option>
	                @if($cates)
		                @foreach($cates as $val)
		                <option value='{{$val->catid}}' {{ Request::input('catid')==$val->catid ? 'selected' : 'false' }} >
		                	{{$val->catname}}
		                </option>
		                @endforeach
	                @endif
	              </select>
	        </div>
	      </div>
	      
	      <div class="form-group">
	        <label for="lastname" class="col-sm-2 control-label">栏目类型</label>
	        <div class="col-sm-10">
	        	<select class="form-control" name='info[type]'>
	        		<option value='cate' selected="true">栏目</option>
	                <option value='page'>单页</option>
	        	</select>
	        </div>
	      </div>
	      
	      <div class="form-group">
	        <label for="lastname" class="col-sm-2 control-label">栏目名称</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" id="catname" name="info[catname]" placeholder="请输入栏目名称">
	        </div>
	      </div>

	      <div class="form-group">
	        <label for="lastname" class="col-sm-2 control-label">英文目录</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" id="dirname" name="info[dirname]" placeholder="请输入英文目录">
	        </div>
	      </div>

	      <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	          <button type="submit" class="btn btn-default">添加</button>
	        </div>
	      </div>
    </form>
@stop




