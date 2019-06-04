<!DOCTYPE html>
<!-- saved from url=(0048)https://m.jiaoyitu.com/ucenter/buyer_order_list/ -->
<html style="font-size: 100px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>我的订单</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
    <style>
        ul>li>a{
            color: #666;
        }
    </style>
</head>

<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a class="mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui" href="{{url('Personal/index')}}"></a>
            <div class="mui-title">提现</div>
        </header>
        <!--//导航-->
        
        <!--搜索-->
        <!--<form method="post" action="__CONTROLLER__/orderlist">
            <div class="search">
                <input type="text" name="keywords" class="search-txt" placeholder="请输入时间">
                <input type="submit" class="search-btn" value="搜 索">
            </div>
        </form>-->
      
        <!--余额-->
        
            <div class="m-top20 orders-list">
                <div class="orders-title"><span class="orders-numb" >余额:<input id="money" value="{{$account_info->account/100}}" readonly style="border:0"></span>
                    <span class="orders-time"><input type="text" name="jine" id="jine" class="search-txt" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入提现金额"> <span class="ti">提现</span></span>
                </div>
                <div class="orders-txt">
                    <div class="shop-list-txt" >
                        <div class="shop-list-left">
                            <p class="shop-list-p"><span class="f70">历史记录:</span></p>
                            <notempty name="list" style="width:500px">
                            @foreach($tran_info as $v)
                                <p class="shop-list-p" style="">{{$v->created_at}} 扣除手续费预计到账 @if($v->status == 1) <span style="color: green;">成功</span> @elseif($v->status == 2) <span style="color:red">失败</span>@else<span style="color:orange">处理中</span> @endif {{$v->money/100*98/100}}元 </p>
                            @endforeach
                            <else/>
                            </notempty>
                        </div>
                    </div>
                </div>
            </div>
       
        <div style="margin-bottom: 1.2rem"></div>
    </div>
  <script>
    $(function(){
        $(".ti").click(function(){
           var money = $("#money").val();
           var jine = $("#jine").val();
           mo = parseInt(money);
           ji = parseInt(jine);
          if(jine == '')
          {
              alert("请输入提现金额");
          }
          if(ji > mo){
            alert("请正确输入提现金额");
          }else {
              $.ajax({
                  url:'{{url('/Personal/withdraw')}}/'+ji,
                  success: function(data) {
                      if (data['code'] == 1) {
                          alert(data['msg']);
                          window.history.go(0);
                      }else {
                          alert(data['msg']);
                          window.history.go(0);
                      }
                  }
              });
          }
        })
    })
  </script>
    
    <!--遮罩层-->
    <div class="filter-mask g-filter-mask" style="display: none"></div>
    <!--遮罩层  end-->

    <!--底部导航-->
    <nav class="mui-bar mui-bar-tab footer-tab" id="mobile_navigate">
        <include file="Public/footer" />
    </nav>

</div>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>

</body>
</html>