@extends('layout.layout')
@section('title', '用户管理')
@section('content')

    <h2>用户列表页</h2>

    <div class="a_link"><a href="/adm/user/add-user">添加管理员</a></div>
    <div class="table_style">
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td width="5%">ID</td>
                <td width="14%">用户名</td>
                <td width="14%">邮箱</td>
                <td width="14%">更新时间</td>
                <td width="15%">管理</td>
            </tr>

            @foreach($users as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->updated_at}}</td>
                    <td><a href="/adm/user/edit-user/{{$v->id}}">修改密码</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br>
        共 {{$count}} 条记录
        {{$users->links()}}

    </div>

@endsection