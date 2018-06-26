<?php $__env->startSection("style"); ?>
    <link href="<?php echo e(asset('static/css/plugins/bootstrap-markdown/bootstrap-markdown.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title"); ?>
	内容发布
<?php $__env->stopSection(); ?>


<?php $__env->startSection("info"); ?>
	内容发布
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
 <?php echo $__env->make('common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
	                <?php if(Request::getPathInfo() == '/admin/content/add'): ?>
	                    <form class="form-horizontal" role="form" method="post" 
	                    	action="<?php echo e(url('admin/content/add')); ?>" 
	                    >
	                    	<?php echo e(csrf_field()); ?>

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
                                        	<?php if($cates): ?>
	                                        	<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                            <option value="<?php echo e($val->catid); ?>"><?php echo e($val->catname); ?></option>
	                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                         <?php else: ?>
	                                         	<option value="-1">暂无栏目</option>
                                            <?php endif; ?>
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
	                    <?php elseif(Request::getPathInfo() == '/admin/content/modify'): ?>
		                   	<form class="form-horizontal" role="form" method="post" 
		                    	action="<?php echo e(url('admin/content/modify')); ?>" 
		                    >
		                    	<?php echo e(csrf_field()); ?>

		                    	<input type="hidden" name="info[id]" value="<?php echo e($data->id); ?>">
		                        <div class="row">
		                            <div class="col-sm-5">
		                                <div class="form-group" style="margin-left:-10%">
		                                    <label for="title" class="col-sm-2 control-label">标题</label>
		                                    <div class="col-sm-10">
		                                        <input type="text" class="form-control" id="title" 
		                                        	name="info[title]" value="<?php echo e($data->title); ?>" 
		                                        >
		                                    </div>
		                                </div>    
		                            </div>
		                            <div class="col-sm-7">
                                        <label for="title" class="control-label">栏目</label>
                                        <select class="form-control" name="info[catid]" id="cate" 
                                        	style="width:40%;display: inline;" 
                                        >
                                        	<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                            <option value="<?php echo e($val->catid); ?>" 
	                                            	<?php echo e($val->catid == $data->catid ? 'selected' : 'false'); ?> 
	                                            >
	                                            	<?php echo e($val->catname); ?>

	                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
		                            </div>
		                        </div>

		                        <div class="row">
		                        	  <div class="form-group col-sm-8" style="margin-left: -2px">
									    <label for="name">简介</label>
									    <textarea class="form-control" rows="3" name="info[description]"><?php echo e($data->description); ?></textarea>
									  </div>
		                        </div>
		                        
		                        <textarea name="info[content]" data-provide="markdown" rows="10"><?php echo e($data->content); ?></textarea>

		                        <input type="submit" class="btn btn-primary" id='btn' value="发布" style="margin-top:10px">
		                    </form>
	                    <?php endif; ?>
	                </div>
	        </div>
	    </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <!-- Bootstrap markdown -->
    <script src="<?php echo e(asset('static/js/plugins/bootstrap-markdown/bootstrap-markdown.js')); ?>"></script>
    <script src="<?php echo e(asset('static/js/plugins/bootstrap-markdown/markdown.js')); ?>"></script>

    
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
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("common.layouts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>