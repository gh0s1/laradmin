@extends("admin.common.layouts")

@section("style")
    <link href="{{ asset('static/css/plugins/bootstrap-markdown/bootstrap-markdown.min.css') }}" rel="stylesheet">
@stop

@section("title")
	内容发布
@stop


@section("info")
	内容发布
@stop

@section("content")
 @include('admin.common.message')
  	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	                <div class="ibox-title">
	                    <h5>内容发布</h5>
	                    <div class="ibox-tools">
	                        <a class="collapse-link">
	                            <i class="fa fa-chevron-up"></i>
	                        </a>
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                            <i class="fa fa-wrench"></i>
	                        </a>
	                        <ul class="dropdown-menu dropdown-user">
	                            <li><a href="#">Config option 1</a>
	                            </li>
	                            <li><a href="#">Config option 2</a>
	                            </li>
	                        </ul>
	                        <a class="close-link">
	                            <i class="fa fa-times"></i>
	                        </a>
	                    </div>
	                </div>
	                <div class="ibox-content">
	                @if(Request::getPathInfo() == '/admin/content/add')
	                    <form class="form-horizontal" role="form" method="post" 
	                    	action="{{ url('admin/content/add') }}" 
	                    >
	                    	{{ csrf_field() }}
	                        <div class="row">
	                            <div class="col-sm-5">
	                                <div class="form-group" style="margin-left:-10%">
	                                    <label for="title" class="col-sm-2 control-label">标题</label>
	                                    <div class="col-sm-10">
	                                        <input type="text" class="form-control" id="title" 
	                                        	name="info[title]" placeholder="请输入文章标题" 
	                                        >
	                                    </div>
	                                </div>    
	                            </div>
	                            <div class="col-sm-7">
	                         
                                    <!--<div id="cate" style="display: none">-->
                                        <label for="title" class="control-label">栏目</label>
                                        <select class="form-control" name="info[catid]" id="cate" 
                                        	style="width:40%;display: inline;" 
                                        >
                                        	@if ($cates)
	                                        	@foreach($cates as $val)
	                                            <option value="{{ $val->catid }}">{{ $val->catname }}</option>
	                                            @endforeach
	                                         @else
	                                         	<option value="-1">暂无栏目</option>
                                            @endif
                                        </select>
                                    <!--</div>-->
	                        
	                            </div>
	                        </div>

	                        <div class="row">
	                        	  <div class="form-group col-sm-8" style="margin-left: -2px">
								    <label for="name">简介</label>
								    <textarea class="form-control" rows="3" name="info[description]"></textarea>
								  </div>
	                        </div>
	                        
	                        <textarea name="info[content]" data-provide="markdown" rows="10"></textarea>

	                        <input type="submit" class="btn btn-primary" id='btn' value="发布" style="margin-top:10px">
	                    </form>
	                    @elseif(Request::getPathInfo() == '/admin/content/modify')
		                   	<form class="form-horizontal" role="form" method="post" 
		                    	action="{{ url('admin/content/modify') }}" 
		                    >
		                    	{{ csrf_field() }}
		                    	<input type="hidden" name="info[id]" value="{{$data->id}}">
		                        <div class="row">
		                            <div class="col-sm-5">
		                                <div class="form-group" style="margin-left:-10%">
		                                    <label for="title" class="col-sm-2 control-label">标题</label>
		                                    <div class="col-sm-10">
		                                        <input type="text" class="form-control" id="title" 
		                                        	name="info[title]" value="{{ $data->title }}" 
		                                        >
		                                    </div>
		                                </div>    
		                            </div>
		                            <div class="col-sm-7">
                                        <label for="title" class="control-label">栏目</label>
                                        <select class="form-control" name="info[catid]" id="cate" 
                                        	style="width:40%;display: inline;" 
                                        >
                                        	@foreach($cates as $val)
	                                            <option value="{{ $val->catid }}" 
	                                            	{{ $val->catid == $data->catid ? 'selected' : 'false' }} 
	                                            >
	                                            	{{ $val->catname }}
	                                            </option>
                                            @endforeach
                                        </select>
		                            </div>
		                        </div>

		                        <div class="row">
		                        	  <div class="form-group col-sm-8" style="margin-left: -2px">
									    <label for="name">简介</label>
									    <textarea class="form-control" rows="3" name="info[description]">{{ $data->description }}</textarea>
									  </div>
		                        </div>
		                        
		                        <textarea name="info[content]" data-provide="markdown" rows="10">{{ $data->content }}</textarea>

		                        <input type="submit" class="btn btn-primary" id='btn' value="发布" style="margin-top:10px">
		                    </form>
	                    @endif
	                </div>
	        </div>
	    </div>

    </div>
@stop

@section("js")
    <!-- Bootstrap markdown -->
    <script src="{{ asset('static/js/plugins/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
    <script src="{{ asset('static/js/plugins/bootstrap-markdown/markdown.js') }}"></script>

    
    <script>
        $(function(){
        	/*
            $("#types").change(function(){
                var index = $("#types").val();
                //console.log(index);
                if(index == 'content')
                {
                    $("#cate").css({"display":""});
                }
                else
                {
                    $("#cate").css({"display":"none"}); 
                }
            });
            */
            if($("#cate").val() == '-1')
            {
            	$("#btn").attr('disabled','disabled');
            }
        });
    </script>
	
@stop