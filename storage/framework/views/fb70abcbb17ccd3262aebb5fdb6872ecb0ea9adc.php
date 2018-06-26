<?php $__env->startSection('title'); ?>
	添加栏目
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection("info"); ?>
	添加栏目
<?php $__env->stopSection(); ?>


<?php $__env->startSection('cate_info'); ?>
<?php echo $__env->make('admin.common.catenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.common.validate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 	<form class="form-horizontal" role="form" style="width: 50%" method="post" 
 		action="<?php echo e(url('admin/content/cate/addcate')); ?>">
 		<?php echo e(csrf_field()); ?>

	      <div class="form-group">
	        <label for="firstname" class="col-sm-2 control-label">上级栏目</label>
	        <div class="col-sm-10">
	              <select class="form-control" name='info[parentid]'>
	                <option value='0' <?php echo e(!Request::input('catid') ? 'selected=true': 'false'); ?>>作为一级栏目</option>
	                <?php if($cates): ?>
		                <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		                <option value='<?php echo e($val->catid); ?>' <?php echo e(Request::input('catid')==$val->catid ? 'selected' : 'false'); ?> >
		                	<?php echo e($val->catname); ?>

		                </option>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                <?php endif; ?>
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
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>