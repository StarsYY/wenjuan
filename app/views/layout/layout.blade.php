<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0056)http://ysxdn.kydev.net/kyadmin.php?file=weixin_sick_case -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bayer.css">
    <script src="/assets/js/jquery.min.js"></script>
</head>
<body>
<div class="page">
    <div class="bd">
        <h1 class="sitename left">赛诺菲文献查询满意度调查</h1>
        <div class="right myset">
            <p>
                @if(Auth::check())
                <span>超级管理员{{Auth::user()->username}},您好！</span>
                <span><a href="/logout">退出</a></span>
                <span><a href="/adm">后台首页</a></span>
                @else
                    <span><a href="/login">登录</a></span>
                @endif
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="left menu">
            <ul class="first_ul">

                <li class="li_style"><a href="/adm">首页</a></li>
                <li class="li_style"><a href="/adm/survey">查看问卷列表</a></li>
                <li class="li_style"><a href="/adm/user">用户管理</a></li>
                <li class="li_style"><a href="/logout">注销</a></li>


            </ul></div>
        <div class="left content">
            @yield('content')
        </div><div class="clear"></div></div></div>

</body></html>