<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $__env->yieldContent("title"); ?></title>

    <link href="<?php echo e(asset('static/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('static/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo e(asset('static/css/plugins/toastr/toastr.min.css')); ?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo e(asset('static/js/plugins/gritter/jquery.gritter.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('static/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('static/css/style.css')); ?>" rel="stylesheet">
    <?php $__env->startSection("style"); ?>

    <?php echo $__env->yieldSection(); ?>

</head>

<body>
    <div id="wrapper">


        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo e(asset('static/img/profile_small.jpg')); ?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold"><?php echo e(Request::session()->get('user')->name); ?></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!--
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                -->
                                <li><a href="<?php echo e(url('admin/logout')); ?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>">
                        
                        <a href="<?php echo e(url('admin/')); ?>">
                            <i class="fa fa-bank"></i> 
                            <span class="nav-label">主页</span>
                        </a>
                        <!--
                        <ul class="nav nav-second-level">
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/info/info' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/info/info')); ?>">基本信息</a>
                            </li>
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/info/seo' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/info/seo')); ?>">seo信息</a>
                            </li>
                        </ul>
                        -->
                    </li>

                    <li class="<?php echo e(Request::is('admin/info/*') ? 'active' : ''); ?>">
                        
                        <a href="#">
                            <i class="fa fa-th-large"></i> 
                            <span class="nav-label">网站信息</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/info/info' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/info/info')); ?>">基本信息</a>
                            </li>
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/info/seo' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/info/seo')); ?>">seo信息</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo e(Request::is('admin/user/*') ? 'active' : ''); ?>">
                        <a href="#">
                            <i class="fa fa-github-square"></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/user/lists' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/user/lists')); ?>">用户列表</a>
                            </li>
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/user/add' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/user/add')); ?>">添加用户</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?php echo e(Request::is('admin/content/*') ? 'active' : ''); ?>">
                        <a href="#">
                            <i class="fa fa-edit"></i> 
                            <span class="nav-label">内容管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">

                            <li class="<?php echo e(Request::getPathInfo() == '/admin/content/cate' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/content/cate')); ?>">栏目管理</a>
                            </li>
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/content/add' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/content/add')); ?>">内容发布</a>
                            </li>
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/content/lists/contents' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/content/lists/contents')); ?>">内容列表</a>
                            </li>
                            <!--
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/content/lists/page' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/content/lists/page')); ?>">单页列表</a>
                            </li>
                            -->
                            <li class="<?php echo e(Request::getPathInfo() == '/admin/content/lists/comments' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('admin/content/lists/comments')); ?>">评论列表</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="<?php echo e(Request::is('admin/wechat/*') ? 'active' : ''); ?>">
                        <a href="#">
                            <i class="fa fa-wechat"></i> 
                            <span class="nav-label">微信端</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Profile</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>
        
        <div id="page-wrapper" class="gray-bg dashbard-1">
                <?php $__env->startSection("header"); ?>
                <div class="row border-bottom">
                
                        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                            <div class="navbar-header">
                                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                                    <i class="fa fa-bars"></i> 
                                </a>
                            </div>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                                </li>
                            
                                
                                <li>
                                    <a href="<?php echo e(url('admin/logout')); ?>">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                                <li>
                                    <a class="right-sidebar-toggle">
                                        <i class="fa fa-tasks"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                </div>
                <?php echo $__env->yieldSection(); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-2">
                        <h2>
                            <?php $__env->startSection("info"); ?>
                           
                            <?php echo $__env->yieldSection(); ?>
                        </h2>
                    </div>
                    <div class="col-lg-10">
                        <?php $__env->startSection('cate_info'); ?>
                        <?php echo $__env->yieldSection(); ?>
                    </div>
                </div>



                <div id="content" style="margin-top:15px">
                    <?php echo $__env->yieldContent("content"); ?>
                </div>

                <?php $__env->startSection('modals'); ?>
                <?php echo $__env->yieldSection(); ?>

                <?php $__env->startSection("footer"); ?>
                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2015
                    </div>
                </div>
                <?php echo $__env->yieldSection(); ?>
        </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('static/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('static/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('static/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('static/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- FooTable -->
    <script src="<?php echo e(asset('static/js/plugins/footable/footable.all.min.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('static/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('static/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

    <?php $__env->startSection("js"); ?>
    <?php echo $__env->yieldSection(); ?>
</body>
</html>
