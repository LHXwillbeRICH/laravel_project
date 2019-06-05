<!DOCTYPE html>
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script src="{{asset('js')}}/push.js"></script><script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
</head>
<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a  href="javascript:;" onClick="javascript :history.back(-1);" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
            <div class="mui-title">确认订单</div>
        </header>
        <!--//导航-->
        <!--选择支付方式-->
        <dl class="commodity-details">
            <dt>{{$store_info->store_name}}</dt>
            <dd><span>商品类型：</span>{{$store_info->tradeInfo->trade_name}}</dd>
            <dd><span>游戏区服：</span>{{$store_info->platInfo->plat_name}}&gt;{{$store_info->game_address}}&gt;{{$store_info->store_name}}</dd>
            <dd><span>商品编号：</span>{{$store_info->store_code}}</dd>
        </dl>
        <!--//选择支付方式-->

        <!--填写商品信息-->
        <form id="order_form" action="{{url('/Pay/index',array('id'=>$store_info->id))}}" method="post">
            {{ csrf_field() }}
            <div class="write-info main-mod m-top20">
                <div class="write-title">填写收货信息</div>
                <h3>(带*号必须填写)</h3>
                <div class="mui-input-row">
                    <label><em>*</em>联系电话</label>
                    <input name="mobile" type="text" id="mobile" value="{{$user->phone}}"  placeholder="请输入电话">
                </div>
                <div class="mui-input-row">
                    <label><em>*</em>联系QQ</label>
                    <input type="text" name="qq" id="qq" placeholder="请输入QQ" value="{{$user->qq}}">
                </div>
                <div class="mui-input-row">
                    <label><em>*</em>微信账号</label>
                    <input type="text" name="wx" id="wx" placeholder="请输入微信账号" value="">
                </div>
                <div class="write-title">确认提交订单</div>
                <p class="write-seller">备注</p>
                <textarea name="des" rows="" id="des" cols="" class="write-remark"></textarea>
                <p class="payment-numb">总价：<span>¥{{$store_info->store_price/100/10*$store_info->store_sale}}</span>优惠：<span>¥{{$store_info->store_price/100}}</span></p>
            </div>
            <!--//填写商品信息-->
            <!--提交-->
            <div class="foot-price write-price">
                <div style="display:inline;float: left">需支付：<em class="foot-number">{{$store_info->RealPrice}}元</em></div>
                <button  class="btn-ljgm" id="btn">提交订单</button>
            </div>
            <!--<input type="hidden" name="goods_id" id="goods_id" value="4115">
            <input type="hidden" name="game_role_exists" id="game_role_exists" value="1">-->
        </form>
        <!--//提交-->
    </div>
</div>

<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>

<script>
    $(function(){
        $("#btn").click(function(){
            var regPhone=/^1[34578]\d{9}$/;
            var mobile = $("#mobile").val();
            var qq = $("#qq").val();

            if(!(regPhone.test(mobile))){
                alert("手机号码有误，请重填!");
                return false;
            }
            if (mobile=='') {
                alert("手机号不能为空！");
                return false;
            }
            if (qq=='') {
                alert("QQ不能为空！");
                return false;
            }

        })
    })
</script>


</body></html>