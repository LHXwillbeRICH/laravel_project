<!DOCTYPE html>
<html style="font-size: 100px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <style>

        *{margin: 0;padding: 0}
        .body-wrap{background:#fff;margin-top: 200px;text-align: center}
        #login-con{border: solid 1px #fff;font-size: 14px;height: 200px;margin: auto}
        #ps{margin-top: 40px;color: #f29500;font-size: 20px}
        #bt{margin-top: 30px}
        #button{color: #f29500;width:70px;height: 30px;border-radius: 10px;line-height: 30px;background: #f1f1f1;outline: none }
        #zd{font-size: 12px;margin-top: 15px;color: #f29500}
    </style>
</head>

<body style="background: #e9e9e9">
<div class="body-wrap">
    <div class="login-section">

        <div class="login-con" id="login-con">
           <p id="ps"> {{$msg}}</p>
            <p id="zd">（将在 <span id="mes">3</span> {{$msg2}}）</p>
            <div id="bt"><input type="button" id="button" value="确定" onclick="tz();" /></div>

        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>

<script>
    //登录
function  tz(){
    location.href="{{url($url)}}";
}

</script>

<script>
    var i = 1;
    var intervalid;
    intervalid = setInterval("fun()", 1000);
    function fun() {
        if (i == 0) {
            location.href =  "{{url($url)}}";
            clearInterval(intervalid);
        }
        document.getElementById("mes").innerHTML = i;
        i--;
    }
</script>
</div>
</body>
</html>