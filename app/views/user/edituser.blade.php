@extends('layout.layout')
@section('title', '修改密码')
@section('content')

    <h2>修改密码</h2>

    <form>
        <div class="input_dl">
            {{Form::token()}}
            <div style="display: none">
                <input type="text" id="id" name="id" value="{{$user->id}}">
            </div>

            <div>
                <label for="password">新密码</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div>
                <label for="password_confirm">确认密码</label>
                <input type="password" name="password_confirmation" id="password_confirmation"/>
            </div>
            <div>
                <input class="btn_p" type="button" onclick="editUser()" value="提交"/>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function editUser() {
            data = {
                'id': $("#id").val(),
                'password': $("#password").val().trim(),
                'password_confirmation': $("#password_confirmation").val(),
                '_token': "{{csrf_token()}}"
            };
            $.post('/adm/user/edit-user', data, function (data) {
                if (data.success) {
                    alert(data.msg);
                    location.href="/adm/user";
                } else {
                    alert(data.msg);
                }
            }, 'json')
        }
    </script>

@endsection