@extends('admin.common.layouts')

@section("title")
网站信息
@stop

@section("info")
  基本信息
@stop

@section("content")
  <form class="form-inline" role="form" action="{{ url('admin/info/info/site_name') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="" for="name">站点名称:</label>
          <input type="text" class="form-control" id="name" name="info[site_name]" 
            placeholder="请输入站点名称"
            value="{{ isset($data->site_name) ? $data->site_name : '' }}"
          >
        </div>
        <button type="submit" class="btn btn-default">保存</button>
  </form>
  <form class="form-inline" style="margin-top: 10px" role="form" action="{{ url('admin/info/info/site_url') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
          <label class="" for="name">站点域名:</label>
          <input type="text" class="form-control" id="name" name="info[site_url]" 
            placeholder="请输入站点url"
            value="{{ isset($data->site_url) ? $data->site_url : '' }}"

          >
      </div>
      <button type="submit" class="btn btn-default">保存</button>
  </form>
@stop