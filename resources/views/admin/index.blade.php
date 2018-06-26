@extends('admin.common.layouts')

@section("title")
	主页
@stop


@section('info')
laradmin v1.0
@stop

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <div class="row">

                    	<div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <i class="fa fa-info-circle"></i> 说明
                                </div>
                                <div class="panel-body">
                                	<p>
                                		如果一件事物有10分  那么我顶多止于6分 因为到6分的时候 就已经开始腻了
                                	</p>
                                	<p>so  我不是高手  做出来的东西也都是半生不熟的  只是喜欢接受新事物  :)</p>
                                    <p>
    									本项目后端代码  用laravel框架完成      只完成了一些基本常用的功能          如果其它需求          请自行进行扩展   
                                    </p>

                                    <p>
                                    	栏目管理项    调用了Bootstrap TreeView控件       如有其它需求改动 请修改Content控制器中的 getTreeData() 方法  
                                    </p>

                                    <p>
                                    	
                                    	栏目移动 会连同其子栏目一起移动到新的父级栏目下 

                                    	顶级栏目不可进行移动操作

                                    	删除  会递归删除其所有的子栏目  
                                    </p>
                                    <p>
                                    	前端功力有限(其实后端也就那么个怂样子)  网上down了一套模板  不是那么美观 
                                    	欢迎交流学习 
                                    </p>

                                    <p>后期  如果时间足  也许会添加RBAC选项 以及一些微信端常用的功能 等等</p>
                                </div>

                            </div>
                        </div>
                 	</div>

                 	<div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                 	源码下载
                                </div>
                                <div class="panel-body">
                                    <p>
                                    	<a href="http://www.baidu.com">http://www.baidu.com</a>
                                	</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    认识一下?
                                </div>
                                <div class="panel-body">
                                	<div class="row">
                                		<div class="col-lg-4">
		                                    <p>
		                                    	
		                                    	<img src="{{ asset('static/img/wechat.png') }}" style="width:150px; height:150px">
		                                    </p>
	                                	</div>
	                                	<div class="col-lg-8">
	                                		<p>
	                                			<a href="http://www.x-debug.com">博客主页</a>
	                                		</p>
	                                		<p>扫描加微信(欢迎妹子们骚扰)</p>
	                                		<p>Email : jiaheqianli@sina.com</p>
	                                	</div>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                     etc etc   
                                </div>
                                <div class="panel-body">
                                	etc   etc    etc   !!!
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
@stop