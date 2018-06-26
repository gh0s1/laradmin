<?php $__env->startSection("title"); ?>
	用户列表
<?php $__env->stopSection(); ?>


<?php $__env->startSection("info"); ?>
	用户列表
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>用户列表</h5>
        </div>
        <div class="ibox-content">

          <table class="table table-stripped toggle-arrow-tiny" data-page-size="8">
            <thead>
            <tr>

              <th data-toggle="true">用户名</th>
              <th>邮箱</th>
              <th>添加时间</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              <td><?php echo e($val->name); ?></td>
              <td><?php echo e($val->email); ?></td>
              <td><?php echo e(date("Y/m/d",$val->created_at)); ?></td>
              <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_<?php echo e($val->id); ?>">修改</a>
                |
                <a href="<?php echo e(url('admin/user/deleteUser').'/'.$val->id); ?>">删除</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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

<?php $__env->startSection('modals'); ?>
    <!-- 模态框（Modal） -->
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <div class="modal fade" id="myModal_<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">用户信息修改</h4>
                  </div>
                  
                  <div class="modal-body">
                      <form class="form-horizontal" role="form" id="form_<?php echo e($val->id); ?>" method="post" action="<?php echo e(url('admin/user/modify')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="User[id]" value="<?php echo e($val->id); ?>">
                            <div class="form-group">
                              <label for="firstname" class="col-sm-2 control-label">用户名</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="User[name]" value="<?php echo e($val->name); ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">邮箱</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="User[email]" value="<?php echo e($val->email); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">密码</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="User[password]" 

                                placeholder="如需更改 请输入新密码">
                              </div>
                            </div>
                      </form>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                      <button type="button" class="btn btn-primary" 
                        onclick="modify(<?php echo e($val->id); ?>,'<?php echo e($val->name); ?>','<?php echo e($val->email); ?>')">
                        提交更改
                      </button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  
  function modify(id,name,email)
  {
      var frm = "#form_"+id;
      //如果没有任何变化  单击提交按钮 则保持不动

      var re_name = $("#name").val();
      var re_email = $("#email").val();
      var password = $("#password").val();
      
      if(re_name == name && re_email == email && password == '')
      {
        return;
      }

      $(frm).submit();
  }


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.common.layouts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>