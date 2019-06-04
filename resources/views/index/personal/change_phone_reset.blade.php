<!DOCTYPE html>
<!-- saved from url=(0045)https://m.pazhewan.com/ucenter/modify_mobile/ -->
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <link type="text/css" rel="stylesheet" href="{{asset('css')}}/sweetalert.css" />
    <script src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/sweetalert.min.js"></script>
</head>

<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
            <div class="mui-title">手机绑定</div>
        </header>
        <!--//导航-->

        <form>
            <div class="payment-box user-recharge">
                <p class="payment-way">手机绑定</p>
                <div class="yanz-con">
                      <input type="text" name="_u" id="r_tel" placeholder="手机号" value="{{$user->phone}}">
                      <button type="button" style="width: 2.5rem" id="send_sms" class="hq-yanz" onClick="get_mobile_code();">获取验证码</button>
                </div>
                <input type="hidden" value="{$send_code}" id="send_code" />
                <input name="verify_code" id="yzm" type="text" placeholder="验证码">
                <button id="btn" class="go-alipay btn-revise modify_mobile_submit">下一步</button>
            </div>
        </form>

    </div>
</div>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>


<script>
    $(function(){
        $("#btn").click(function(){
            var r_phone = $("#r_tel").val();
            var r_code = $("#yzm").val();
            var regPhone=/^1[34578]\d{9}$/;//验证手机号的正则
            if(!(regPhone.test(r_phone))){
                swal("手机号码有误，请重填!");
                return false;
            }
            if (r_code=='') {
                swal("验证码不能为空！");
                return false;
            }
            $.ajax({
                url:"__CONTROLLER__/phone_mobile",
                data:{R_phone:r_phone,R_code:r_code},//要用create方法，这里的列名就要和数据库中的列名一样，这里的首字母要大写。
                type:"POST",
                dataType:"TEXT",
                success: function(data){
                    if(data =='1'){
                            location.href='__MODULE__/Personal/phone_new';
                    }else {
                        alert(data);location.reload();
                    }
                }
            })
        })
    })
</script>
<!--获取验证码-->
<script>
    function get_mobile_code(){
        var r_phone = $("#r_tel").val();

        var regPhone=/^1[34578]\d{9}$/;//验证手机号的正则
        if(!(regPhone.test(r_phone))){
            swal("手机号码有误，请重填!");
            return false;
        }

        $.get('{{url('/Personal/sms_code')}}', {phone:r_phone}, function(msg) {
            //alert(jQuery.trim(unescape(msg)));
            if(msg=='提交成功'){
                swal("验证码发送成功，请注意查收！");RemainTime();
            }else {
                alert(msg);RemainTime();
            }
        });
    }
</script>
<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>