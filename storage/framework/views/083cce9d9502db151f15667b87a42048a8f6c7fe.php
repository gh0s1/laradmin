<?php $__env->startSection("title"); ?>
主页
<?php $__env->stopSection(); ?>

<?php $__env->startSection("info"); ?>
  基本信息
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
  <form class="form-inline" role="form" action="<?php echo e(url('admin/info/info/site_name')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label class="" for="name">站点名称:</label>
          <input type="text" class="form-control" id="name" name="info[site_name]" 
            placeholder="请输入站点名称"
            value="<?php echo e(isset($data->site_name) ? $data->site_name : ''); ?>"
          >
        </div>
        <button type="submit" class="btn btn-default">保存</button>
  </form>
  <form class="form-inline" style="margin-top: 10px" role="form" action="<?php echo e(url('admin/info/info/site_url')); ?>" method="post">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
          <label class="" for="name">站点域名:</label>
          <input type="text" class="form-control" id="name" name="info[site_url]" 
            placeholder="请输入站点url"
            value="<?php echo e(isset($data->site_url) ? $data->site_url : ''); ?>"

          >
      </div>
      <button type="submit" class="btn btn-default">保存</button>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>