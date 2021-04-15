@extends('layout.layout')
@section('title', '添加管理员')
@section('content')

    <h2>添加管理员</h2>

    <form>
        <div class="input_dl">
            {{Form::token()}}
            <div>
                <label for="username">用户名</label>
                <input type="text" name="username" id="username"/>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email"/>
            </div>
            <div>
                <label for="password">密码</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div>
                <label for="password_confirm">确认密码</label>
                <input type="password" name="password_confirmation" id="password_confirmation"/>
            </div>
            <div>
                <input class="btn_p" type="button" onclick="addUser()" value="提交"/>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function addUser(){
            data = {
                'username': $("#username").val().trim(),
                'email': $("#email").val().trim(),
                'password': $("#password").val(),
                'password_confirmation': $("#password_confirmation").val(),
                '_token': "{{csrf_token()}}"
            };
            $.post('/adm/user/add-user', data, function (data) {
                if (data.success) {
                    alert(data.msg);
                    location.href="/adm/user";
                } else {
                    alert(data.msg);
                }
            }, 'json');
        }
    </script>

@endsection