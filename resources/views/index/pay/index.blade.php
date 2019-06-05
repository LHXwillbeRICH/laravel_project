<!DOCTYPE html>
<!-- saved from url=(0023)https://m.pazhewan.com/ -->
<html>
<head>

	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>{{$title}}</title>
	<script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', {
                    "appId":"{{$info['appId']}}",     //公众号名称，由商户传入
                    "timeStamp":"{{$info['timeStamp']}}",         //时间戳，自1970年以来的秒数
                    "nonceStr":"{{$info['nonceStr']}}", //随机串
                    "package":"{{$info['package']}}",
                    "signType":"{{$info['signType']}}",         //微信签名方式：
                    "paySign":"{{$info['paySign']}}" //微信签名
                },
            function(res){
                WeixinJSBridge.log(res.err_msg);
                //alert(res.err_code+res.err_desc+res.err_msg);
                window.location.href='http://www.shouchonghao.com';
            }
        );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
	</script>
</head>
<body>
<br/>
<font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">{{$price}}元</span>钱</b></font><br/><br/>
<div align="center">
	<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
</div>
</body>
</html>