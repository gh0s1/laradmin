@extends("admin.common.layouts")

@section("title")
	SEO信息
@stop

@section("info")
	SEO信息
@stop

@section("content")
	<form class="form-inline" role="form" action="{{ url('admin/info/seo/site_title') }}" method="post">
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-3 control-labe" style="text-align: right;" for="name">站点标题:</label>
	        <div class="col-sm-6" style="margin-left:-10px">
	            <input type="text" class="form-control" id="name" name="info[site_title]" 
	            	placeholder="请输入站点标题"
	            	value="{{ isset($data->site_title) ? $data->site_title : '' }}"
	            >
	        </div>
	        <div class="col-sm-3">
	            <button type="submit" class="btn btn-default">保存</button>
	        </div>
	    </div>
	</form>

	<form class="form-inline" style="margin-top: 10px;" role="form" 
		action="{{ url('admin/info/seo/keywords') }}" method="post">
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-3 control-labe" style="text-align: right;" for="name">关键字:</label>
	        <div class="col-sm-6" style="margin-left: -7px;">
	            <input type="text" class="form-control" id="name" name="info[keywords]" 
	            	placeholder="请输入关键字"
	            	value="{{ isset($data->keywords) ? $data->keywords : '' }}"
	            >
	        </div>
	        <div class="col-sm-3">
	            <button type="submit" class="btn btn-default">保存</button>
	        </div>
	    </div>
	</form>

	<form class="form-inline" style="margin-top: 10px;" role="form" 
		action="{{ url('admin/info/seo/description') }}" method="post">
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-3 control-labe" style="text-align: right;" for="name">描述:</label>
	        <div class="col-sm-6" style="margin-left: -4px">
	            <input type="text" class="form-control" id="name" name="info[description]" 
	            	placeholder="请输入描述信息"
	            	value="{{ isset($data->description) ? $data->description : '' }}"
	            >
	        </div>
	        <div class="col-sm-3">
	            <button type="submit" class="btn btn-default">保存</button>
	        </div>
	    </div>
	</form>
@stop