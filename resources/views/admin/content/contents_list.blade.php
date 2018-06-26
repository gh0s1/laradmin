@extends("admin.common.layouts")

@section("title")
	文章列表
@stop

@section("info")
	文章列表
@stop

@section("content")
 @include('admin.common.message')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>文章列表</h5>
				</div>
				<div class="ibox-content">

					<table class="table table-stripped toggle-arrow-tiny" data-page-size="8">
						<thead>
						<tr>

							<th data-toggle="true">标题</th>
							<th>作者</th>
							<th>类别</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						@if($data)

							@foreach($data as $val)
							<tr>
								<td>{{ $val->title}}</td>
								<td>{{ $val->author}}</td>
								<td>
									@if($val->type == 'cate')
										栏目
									@else
										单页
									@endif
								</td>
								<td>{{ date('Y/m/d') }}</td>
								<td>
									<a href="#">浏览</a>
									|
									<a href="{{ url('admin/content/modify?id='.$val->id)}}">修改</a>
									|
									<a href="{{ url('admin/content/deletecontent?id='.$val->id) }}">删除</a>
								</td>
							</tr>
							@endforeach
						@else
							<tr><td>暂无内容</td></tr>
						@endif
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">
								<div class="pull-right">
			                    {{ $data->links() }}
			                  	</div>
							</td>
						</tr>
						</tfoot>
					</table>
			</div>
	</div>
@stop