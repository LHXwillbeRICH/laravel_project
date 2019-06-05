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
            <div class="mui-title">商品列表</div>
        </header>
        <!--//导航-->

        <!--搜索-->
        <!--<form method="post" action="__CONTROLLER__/orderlist">
            <div class="search">
                <input type="text" name="keywords" class="search-txt" placeholder="请输入商品名称">
                <input type="submit" class="search-btn" value="搜 索">
            </div>
        </form>-->
        <!--//搜索-->

        <div class="shop-filter orders-shop-filter">
            <ul>
                <li @if($type == 1) class="active" @endif><a href="{{url('Personal/store_list',array('type'=>1))}}" @if($type== 1)style="color: #f29500;"@endif>手游商品</a></li>
                <li  @if($type == 2) class="active" @endif><a href="{{url('Personal/store_list',array('type'=>2))}}" @if($type== 2)style="color: #f29500;"@endif>端游商品</a></li>
            </ul>
        </div>

        <!--订单列表-->
         @foreach($store_list as $v)
            <div class="m-top20 orders-list" id="div{{$v->id}}">
                <div class="orders-title"><span class="orders-numb" >商品号:{{$v->store_code}}</span><span class="orders-time">时间:{{$v->created_at}}</span>
                </div>
                <div class="orders-txt">
                    <p class="commodity-title"><a style="color: #333;" href="{:U('personal/inside',array('id'=>$menu['store_id']))}">{{$v->store_name}} </a></p>
                    <div class="shop-list-txt" >
                        <div class="shop-list-left">
                            <p class="shop-list-p"><span class="f60">所属区服:</span>
                            </p>
                            <!--seller info-->
                            <p class="shop-list-p">
                                &nbsp;{{$v->equipmentInfo->e_name}}&gt;{{$v->platInfo->plat_name}}&gt;{{$v->game_address}}</p>
                        </div>
                        <div class="shop-sub">
                            <div class="commodity-discount">
                                <div class="commodity-price"><em class="color3">¥{{$v->store_price/100/100*$v->store_sale}}</em></div>
                                <div class="discount-yh">打{{$v->store_sale}}折</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="orders-state">
                    卖出商品：<em>{$menu.store_count}个</em>

                </div>-->
                <div class="orders-btns">
                        <a href="javascript:void(0);" id="{{$v->id}}" onclick="deleteStore(this)" class="orders-btn-jxs">删除商品</a>
                         <a href="{{url('/Buy/detail',['id'=>$v->id])}}" id="" class="orders-btn-jx">查看详情</a>
                </div>
            </div>
        @endforeach
        <div style="margin-bottom: 1.2rem"></div>
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
<script>
    function deleteStore(e){
        var id = $(e).attr('id');
            $.ajax({
                url:"/store/changeStoreStatus/"+id+'/3',
                data:{},//要用create方法，这里的列名就要和数据库中的列名一样，这里的首字母要大写。
                type:"GET",
                dataType:"json",
                success: function(data){
                    if(data['code'] ==0){
                        mui.alert(data['msg'],'提示','确定',function () {
                        });
                    }else{
                        mui.alert(data['msg'],'提示','确定',function () {
                            $('#div'+id).remove();
                        });
                    }

                }
            })
    }

</script>
</body>
</html>