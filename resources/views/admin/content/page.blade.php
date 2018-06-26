@extends('admin.common.layouts')

@section('title')
	添加单网页
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
	添加单网页
@stop


@section('cate_info')
@include('admin.common.catenav')
@stop


@section('content')
	<form class="form-horizontal" role="form" style="width: 50%">
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上级栏目</label>
		<div class="col-sm-10">
		      <select class="form-control">
		        <option selected>作为一级栏目</option>
		        <option>栏目1</option>
		        <option>
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            |--子栏目1
		        </option>

		        <option>
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            |--子栏目1
		        </option>
		        
		        <option>
		            &nbsp;&nbsp;&nbsp;&nbsp;|--子栏目2
		        </option>
		        <option>
		            &nbsp;&nbsp;&nbsp;&nbsp;|--子栏目3
		        </option>
		        <option>栏目2</option>
		        <option>栏目3</option>
		        <option>栏目4</option>
		      </select>
		</div>
		</div>

		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">栏目名称</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="lastname" placeholder="请输入姓">
		</div>
		</div>

		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">英文目录</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="lastname" placeholder="请输入姓">
		</div>
		</div>

		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default">添加</button>
		</div>
		</div>
	</form>
@stop

