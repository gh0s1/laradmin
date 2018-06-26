@extends("admin.common.layouts")

@section("title")
	评论列表
@stop

@section("info")
	评论列表
@stop

@section("content")
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>评论列表</h5>
				</div>
				<div class="ibox-content">

					<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
						<thead>
						<tr>

							<th data-toggle="true">标题</th>
							<th>作者</th>
							<th>评论者</th>
							<th>评论时间</th>
							<th>评论内容</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Project - This is example of project</td>
							<td>Patrick Smith</td>
							<td>Patrick Smith</td>
							<td>0800 051213</td>
							<td><a href="#">评论内容简介</a></td>
							<td>
								<a href="#">回复</a>
								|
								<a>删除</a>
							</td>
						</tr>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">
								<ul class="pagination pull-right"></ul>
							</td>
						</tr>
						</tfoot>
					</table>

			</div>
	</div>
@stop