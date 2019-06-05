<!DOCTYPE html>
<!-- saved from url=(0048)https://m.jiaoyitu.com/ucenter/buyer_order_list/ -->
<html style="font-size: 100px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
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
            <div class="mui-title">我的订单</div>
        </header>
        <!--//导航-->

        <!--搜索-->
        <form method="post" action="{:U('orderSearch')}">
            <div class="search">
                <input type="text" name="keywords" class="search-txt" placeholder="请输入订单编号">
                <input type="submit" class="search-btn" value="搜 索">
            </div>
        </form>
        <!--//搜索-->

        <div class="shop-filter orders-shop-filter">
            <ul>
                <li @if($status == 0) class="active" @endif ><a href="{{url('Order/list',array('status'=>0))}}" @if($status == 0) style="color: #f29500;" @endif >全部</a></li>
                <li @if($status == 1) class="active" @endif ><a href="{{url('Order/list',array('status'=>1))}}" @if($status == 1) style="color: #f29500;" @endif >未支付</a></li>
                <li @if($status == 2) class="active" @endif ><a href="{{url('Order/list',array('status'=>2))}}" @if($status == 2) style="color: #f29500;" @endif >待发货</a></li>
                <li @if($status == 3) class="active" @endif ><a href="{{url('Order/list',array('status'=>3))}}" @if($status == 3) style="color: #f29500;" @endif >待确认收货</a></li>
                <li @if($status == 4) class="active" @endif ><a href="{{url('Order/list',array('status'=>4))}}" @if($status == 4) style="color: #f29500;" @endif >交易成功</a></li>
            </ul>
        </div>

        <!--订单列表-->
         @foreach($order_list as $v)
            <div class="m-top20 orders-list">
                <div class="orders-title"><span class="orders-numb" >订单号:{{$v->order_code}}</span><span class="orders-time">时间:{{$v->created_at}}</span>
                </div>
                <div class="orders-txt">
                    <p class="commodity-title"><a style="color: #333;" href="">{{$v->storeInfo->store_name}} </a></p>
                    <div class="shop-list-txt" >
                        <div class="shop-list-left">
                            <p class="shop-list-p"><span class="f60">所属区服:</span>
                            </p>
                            <!--seller info-->
                            <p class="shop-list-p">
                                &nbsp;{{$v->storeInfo->equipmentInfo->e_name}}&gt;{{$v->storeInfo->platInfo->plat_name}}&gt;{{$v->storeInfo->game_address}}</p>
                        </div>
                        <div class="shop-sub">
                            <div class="commodity-discount">
                                <div class="commodity-price"><em class="color3">¥{{$v->storeInfo->RealPrice}}</em></div>
                                <div class="discount-yh">优惠¥{{$v->storeInfo->OldPrice- $v->storeInfo->RealPrice}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($v->status == 4 || $v->status == 3)
                <div class="orders-state" style="display:inline-block">
                    <b>游戏账号:</b><span style="color:red">{{$v->storeInfo->game_account}}</span>
                </div>
                <div class="orders-state" style="display:inline-block">
                    <b>游戏密码:</b><span style="color:red">{{$v->storeInfo->game_password}}</span>
                </div>
                @endif
                <div style=" display: inline-block;width: 100%;box-sizing: border-box;">

                    <div class="orders-state" style="float: left">
                        订单状态：<em>
                                @if($v->status == 1)未付款 @endif
                                @if($v->status == 2)待发货 @endif
                                @if($v->status == 3)已发货 @endif
                                @if($v->status == 4)交易成功 @endif
                           </em>
                    </div>

                    <div class="orders-btns" style="float: right">
                        @if($v->status == 1)
                            <a href="{{url('Order/changeOrderStatus',['status'=>$status,'id'=>$v->id,'del'=>1])}}" id="" class="orders-btn-jxs">删除订单</a>
                            <a href="{{url('Pay/index',['id'=>$v->s_id,'orderid'=>$v->id])}}" id="" class="orders-btn-jx">去支付</a>
                        @endif
                        @if($v->status == 3)
                             <!--<a href="{:U('changeOrderStatus',array('id'=>$list_order['order_id'],'type'=>$type))}" id="" class="orders-btn-jxs">删除订单</a>-->
                            <a href="{{url('Order/changeOrderStatus',['status'=>$status,'id'=>$v->id])}}" id="" class="orders-btn-jx">确认收货</a>
                        @endif
                        @if($v->status == 4)
                            <a href="{{url('Order/changeOrderStatus',['status'=>$status,'id'=>$v->id,'del'=>1])}}" id="" class="orders-btn-jxs">删除订单</a>
                        @endif
                       <!-- <if condition="$list_order.order_status eq 4">
                            <a href="{:U('changeOrderStatus',array('id'=>$list_order['order_id'],'type'=>$type))}" id="" class="orders-btn-jxs">删除订单</a>
                        </if>-->
                    </div>
                </div>
            </div>
        @endforeach



    </div>



    <!--遮罩层-->
    <div class="filter-mask g-filter-mask" style="display: none"></div>
    <!--遮罩层  end-->

    <!--底部导航-->
    <nav class="mui-bar mui-bar-tab footer-tab" id="mobile_navigate">
       @include('footer')
    </nav>

</div>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
</body>
</html>