@extends("admin.common.layouts")

@section("title")
	添加用户
@stop


@section("info")
	添加用户
@stop

@section("content")
    
    @include('admin.common.message')
    @include('admin.common.validate')
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-6 b-r">
                <form role="form" method="post" action="{{ url('admin/user/add') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>邮箱</label> 
                        <input type="text" placeholder="Enter email" name="User[email]" 
                            value="{{ old('User')['email'] }}"
                            class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>用户名</label> 
                        <input type="text" placeholder="Enter username" name="User[name]" 
                            value="{{ old('User')['name'] }}"
                            class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>密码</label> 
                        <input type="password" placeholder="Password" name="User[password]" 
                            value="{{ old('User')['password'] }}"
                            class="form-control">
                    </div>
                    
                    <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                            <strong>提交</strong>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-sm-6">
                <h4>在此创建一个新用户</h4>
                <p>You can create an account:</p>
                <p class="text-center">
                    <a href=""><i class="fa fa-sign-in big-icon"></i></a>
                </p>
            </div>

        </div>

    </div>
@stop
