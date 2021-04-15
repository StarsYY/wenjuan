<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0034)http://ysxdn.kydev.net/kyadmin.php -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bayer.css">
    <script src="/assets/js/jquery.min.js"></script>
</head>
<body>
<div class="f_dl">
    <div class="f_top">
        <p></p>
        <div class="f_title"><span>赛诺菲文献满意度调查</span><br><span style="margin-left: 200px;">网站后台管理系统</span></div>
    </div>
    <div class="page_center">
        <div class="dl_box">
            <div class="input_dl">
                <form>
                    {{Form::token()}}
                    <div class="dl_one"><label>用户名：</label><input type="text" id="username" name="username"></div>
                    <div class="dl_two"><label>密 码：</label><input type="password" id="password" name="password"></div>
                    <div class="dl_btn">
                        <input type="button" value="登录" class="btn_p" onclick="login()">
                        <input type="reset" value="重置" class="btn_p">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function login() {
            data = {
                'username': $("#username").val().trim(),
                'password': $("#password").val().trim(),
                '_token': "{{csrf_token()}}"
            };
            $.post('/login', data, function (data) {
                if (data.success) {
                    alert(data.msg);
                    location.href="/adm";
                } else {
                    alert(data.msg);
                }
            }, 'json')
        }
    </script>

    <div class="page_footer">
        <div class="page_footer_bd"></div>
    </div>
</div>

</body>
</html>