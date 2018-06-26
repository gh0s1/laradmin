<?php $__env->startSection('title'); ?>
	管理栏目
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

        .badge
        {
            width:80%;
            background: white;
            border-radius: 0px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("info"); ?>
	管理栏目
<?php $__env->stopSection(); ?>


<?php $__env->startSection('cate_info'); ?>
<?php echo $__env->make('common.catenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table" style="background: white">
      <thead>
        <tr>
          <th>栏目名称</th>
          <th>catid</th>
          <th>栏目类型</th>
          <th>操作</th>
        </tr>
      </thead>
    </table>

    <div style="background: white">
        <div id="treeview"></div>
    </div>
<?php $__env->stopSection(); ?>


<?php if($cates): ?>
<?php $__env->startSection('modals'); ?>
    <!-- 模态框（Modal） -->
    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <div class="modal fade" id="myModal_<?php echo e($val->catid); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">栏目信息修改</h4>
                  </div>
                  
                  <div class="modal-body">
                      <form class="form-horizontal" role="form" id="form_<?php echo e($val->catid); ?>" method="post" action="<?php echo e(url('admin/content/cate/modifycate')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="info[catid]" value="<?php echo e($val->catid); ?>">
                            <div class="form-group">
                              <label for="firstname" class="col-sm-2 control-label">栏目名称</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="catname" name="info[catname]" value="<?php echo e(preg_replace('/(\&nbsp\;)*(\|\-\-){1}/','', $val->catname)); ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">上级栏目</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="parentid" name='info[parentid]'>
                                    <option value="0" <?php echo e($val->parentid == 0 ? 'selected' : 'false'); ?>>
                                        作为一级栏目
                                    </option>
                                    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <option value='<?php echo e($value->catid); ?>'
                                        <?php echo e($val->parentid == $value->catid ? 'selected' : 'false'); ?>

                                      >
                                        <?php echo e($value->catname); ?>

                                      </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lastname" class="col-sm-2 control-label">英文目录</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="dirname" name="info[dirname]" value="<?php echo e($val->dirname); ?>">
                              </div>
                            </div>
                      </form>
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                      <button type="button" class="btn btn-primary" 
                        onclick="modify(<?php echo e($val->catid); ?>,<?php echo e($val->parentid); ?>,'<?php echo e($val->catname); ?>','<?php echo e($val->dirname); ?>')">
                        提交更改
                      </button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php $__env->startSection("js"); ?>
<script src="<?php echo e(asset('static/js/bootstrap-treeview.js')); ?>"></script>

<script>

    var data = [<?php echo $data; ?>];
    function getTree() {
        return data;
    }
 
    $('#treeview').treeview({
        data: getTree(),
        showTags : true,
        onhoverColor : 'white',
        selectedBackColor : 'white',
        selectedColor : 'black',
        enableLinks : true
    }); 



    function modify(catid,parentid,catname,dirname)
    {
        var frm = "#form_"+catid;
        //如果没有任何变化  单击提交按钮 则保持不动

        var re_catname  = $("#catname").val();
        var re_dirname  = $("#dirname").val();
        var re_parentid = $("#parentid").val();
  
        if(re_catname == catname && re_dirname == dirname && re_parentid == parentid)
        {
          return;
        }

        $(frm).submit();
    } 

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>