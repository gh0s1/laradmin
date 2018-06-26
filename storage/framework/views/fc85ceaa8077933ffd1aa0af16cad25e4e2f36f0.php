<?php $__env->startSection("title"); ?>
	文章列表
<?php $__env->stopSection(); ?>

<?php $__env->startSection("info"); ?>
	文章列表
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>文章列表</h5>
				</div>
				<div class="ibox-content">

					<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
						<thead>
						<tr>

							<th data-toggle="true">标题</th>
							<th>作者</th>
							<th>添加时间</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Project - This is example of project</td>
							<td>Patrick Smith</td>
							<td>0800 051213</td>
							<td>
								<a href="#">修改</a>
								|
								<a>删除</a>
							</td>
						</tr>
						<tr>
							<td>Alpha project</td>
							<td>Alice Jackson</td>
							<td>0500 780909</td>
							<td>
								<a href="#">修改</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("common.layouts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>