
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{ Request::getPathInfo()== '/admin/content/cate' ? '修改失败!' : '添加失败!'}} 
    {{ Session::get('error') }}
</div>
@endif