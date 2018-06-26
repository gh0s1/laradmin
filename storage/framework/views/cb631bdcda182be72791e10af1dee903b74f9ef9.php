<?php $__env->startSection("title"); ?>
	文章列表
<?php $__env->stopSection(); ?>

<?php $__env->startSection("info"); ?>
	文章列表
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
 <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
						<?php if($data): ?>

							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><?php echo e($val->title); ?></td>
								<td><?php echo e($val->author); ?></td>
								<td>
									<?php if($val->type == 'cate'): ?>
										栏目
									<?php else: ?>
										单页
									<?php endif; ?>
								</td>
								<td><?php echo e(date('Y/m/d')); ?></td>
								<td>
									<a href="#">浏览</a>
									|
									<a href="<?php echo e(url('admin/content/modify?id='.$val->id)); ?>">修改</a>
									|
									<a href="<?php echo e(url('admin/content/deletecontent?id='.$val->id)); ?>">删除</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						<?php else: ?>
							<tr><td>暂无内容</td></tr>
						<?php endif; ?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">
								<div class="pull-right">
			                    <?php echo e($data->links()); ?>

			                  	</div>
							</td>
						</tr>
						</tfoot>
					</table>
			</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.common.layouts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>