<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>survey</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css" />
    <script src="/assets/js/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img src="/assets/images/logo.png" />
    </div>
    <div class="survey_box">
        <h3>赛诺菲文献查询满意度调查</h3>
        <div class="welcome">
            <p>您好！</p>
            <p class="thanks">感谢您使用赛诺菲文献检索服务。希望您对我们的服务进行评价，以便我们准确了解您的需求并提供更好的服务。</p>
        </div>
        <div class="survey_body">
            <div class="email">
                <label>您的邮箱是</label>
                <input type="text" name="email" id="email" value="{{$email}}" />
            </div>
            <div class="ques_one">
                <p>问题1: 您对文献检索的结果是否满意？</p>
                <p>
                    <input type="radio" name="q1" id="q11" value=1 checked /><span>满意</span>
                    <input type="radio" name="q1" id="q12" value=0 /><span>不满意</span>
                </p>
            </div>
            <div class="ques_one" id="q2" style="display: none">
                <p>问题2: 若不满意，请问我们应该在哪些方面改进?</p>
                <p>
                    <input type="checkbox" id="q21" value="1" />检索结果不够精准
                </p>
                <p>
                    <input type="checkbox" id="q22" value="2" />检索结果不全面
                </p>
                <p>
                    <input type="checkbox" id="q23" value="3" />反馈时间超出规定天数
                </p>
                <p>
                    <input type="checkbox" id="q24" value="4" />流程繁琐
                </p>
                <p>
                    <input type="checkbox" id="q25" value="5" />服务态度不佳
                </p>
            </div>
        </div>
        <div class="submit_btn">
            <input type="button" class="btn" value="提交" id="btn_submit" />
        </div>

        <script type="text/javascript">
            $(function (){
                $("#q11").click(function (){
                    $("#q2").hide();
                });
                $("#q12").click(function (){
                    $("#q2").show();
                });

                $("#btn_submit").click(function (){
                    var q1 = $("[name='q1']:checked").eq(0).val();
                    if (q1 == 1){
                        //满意
                        data = {
                            'email':$("#email").val(),
                            'q1':1,
                            '_token':"{{csrf_token()}}"
                        };
                    } else {
                        //不满意
                        data = {
                            'email':$("#email").val(),
                            'q1':0,
                            'q21':($("#q21")[0].checked)?1:0,
                            'q22':($("#q22")[0].checked)?1:0,
                            'q23':($("#q23")[0].checked)?1:0,
                            'q24':($("#q24")[0].checked)?1:0,
                            'q25':($("#q25")[0].checked)?1:0,
                            '_token':"{{csrf_token()}}"
                        };
                    }

                    $.post('/', data, function (data) {
                        if (data.success){
                            alert(data.msg);
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }, 'json')
                });
            })
        </script>
    </div>
</div>
</body>
</html>
