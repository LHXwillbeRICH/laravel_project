<!DOCTYPE html>
<!-- saved from url=(0041)https://m.pazhewan.com/game_sch_sy/xxian/ -->
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="canonical" href="https://www.jiaoyitu.com/game_sch_sy/xxian/">
        <meta charset="utf-8">
        <title>趴着玩</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script src="{{asset('js')}}/push.js"></script>
    <script src="{{asset('js')}}/hm.js"></script>
    <script src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
<script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
</head>

    <body>
        <div class="body-wrap">
            <div class="mui-content">
                <!--导航-->
                <header class="mui-bar mui-bar-nav page-nav">
                    <a href="javascript:;" onClick="javascript :history.back(-1);" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
                    <div class="mui-title">{{$game_info->game_name}}</div>
                </header>
                <!--//导航-->

                <!--筛选-->
              <div class="shop-filter">
                      <ul>
                          <li>
                              <div id="dropdown1" class="bianse" >
                                  <p  class="show-shop">商品类型<i class="arrow"></i></p>
                                  <ul>
                                      <li><a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>0,'plat'=>$plat,'qufu'=>$qufu,'sort'=>$sort])}}">全部</a></li>
                                      @foreach($trade_list as $v)
                                          <li> <a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$v['id'],'plat'=>$plat,'qufu'=>$qufu,'sort'=>$sort])}}">{{$v['trade_name']}}</a></li>
                                      @endforeach
                                  </ul>
                              </div>
                          </li>
                          <li>
                              <div id="dropdown2" class="bianse">
                                  <p class="show-shop">平台<i class="arrow"></i></p>

                                  <ul>
                                      <li><a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>0,'qufu'=>$qufu,'sort'=>$sort])}}">全部</a></li>
                                      @foreach($plat_list as $v)
                                          <li> <a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>$v['id'],'qufu'=>$qufu,'sort'=>$sort])}}">{{$v['plat_name']}}</a></li>
                                      @endforeach
                                  </ul>
                              </div>
                          </li>
                          <li>
                              <div id="dropdown3" class="bianse">
                                  <p class="show-shop">区服<i class="arrow"></i></p>
                                  <ul>
                                      <li><a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>$plat,'qufu'=>0,'sort'=>$sort])}}">全部</a></li>
                                      @foreach($game_address as $v)
                                          <li> <a href="{{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>$plat,'qufu'=>$v,'sort'=>$sort])}}">{{$v}}</a></li>
                                      @endforeach
                                  </ul>
                              </div>

                          </li>
                          <li>
                              <div id="dropdown4" class="bianse">
                                  <p class="show-shop">排序<i class="arrow"></i></p>
                                  <ul>
                                      价格：
                                      <li>  <a rel='nofollow' href=" {{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>$plat,'qufu'=>$qufu,'sort'=>'asc'])}}">低—>高</a></li>
                                      <li>  <a rel='nofollow' href=" {{url('/Buy/store_list',['id'=>$game_info->id,'type'=>$type,'plat'=>$plat,'qufu'=>$qufu,'sort'=>'desc'])}}">高—>低</a></li>
                                  </ul>
                              </div>
                          </li>
                      </ul>


              </div>
                <!--//筛选-->
                
                <!--商品列表-->
                <ul class="shop-list m-top20">
                @foreach($store_list as $v)
                  <li>
                  <a href="{{url('/Buy/detail',['id'=>$v['id']])}}">
                   <p class="commodity-title">{{$v->store_name}}</p>
            <div class="shop-list-txt">
                <div class="shop-list-left">
                    <p class="shop-list-p">商品类型: {{$v->tradeInfo->trade_name}}</p>
                <p class="shop-list-p">出售人：{{$v->userInfo['name']}}</p>
                    <p class="shop-list-p">{{$v->equipmentInfo->e_name}}&gt;{{$v->platInfo->plat_name}}&gt;{{$v->game_address}}</p>

                </div>
                <div class="shop-sub">
                    <div class="commodity-discount">
                        <div class="commodity-price"><em class="color3">¥{{$v->RealPrice}}</em></div>
                        <div class="discount-sc">
                            <em>{{$v->store_sale}}折</em>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </li>
@endforeach
</ul>
<!--//商品列表-->
@include('footer')
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript">
$(function(){
   $(".bianse p").click(function () {
       var i = $(this).index();
       $(this).addClass("active").siblings().removeClass("active");
       $(".shop-filter p i").removeClass("active");
       $(".shop-filter p").removeClass("active");
       $(this).find("i").addClass("active");
       $(this).addClass("active");
       $('.shop-open').eq(i).show().siblings('.shop-open').hide();

       $('.filter-mask').show();
   });
    $('.filter-mask').click(function(){
        $('.shop-open').hide();
        $('.filter-mask').hide();
    })
})
</script>
<script type="text/javascript">
  $("#dropdown1 p").click(function(){ 
    var ulo = $("#dropdown1 ul");
    var ult = $("#dropdown2 ul");
    var uls = $("#dropdown3 ul");
    var ulf = $("#dropdown4 ul");
    if(ulo.css("display")=="none"){ 
        ulo.slideDown("fast"); 
        ult.slideUp("fast");
        uls.slideUp("fast");
        ulf.slideUp("fast");
    }else{ 
        ulo.slideUp("fast"); 
    } 
}); 
  
   $("#dropdown2 p").click(function(){
    var ulo = $("#dropdown1 ul");
    var ult = $("#dropdown2 ul");
    var uls = $("#dropdown3 ul");
    var ulf = $("#dropdown4 ul");
    if(ult.css("display")=="none"){ 
        ult.slideDown("fast"); 
        ulo.slideUp("fast");
        uls.slideUp("fast");
        ulf.slideUp("fast");
    }else{ 
        ult.slideUp("fast"); 
    } 
}); 
  
  $("#dropdown3 p").click(function(){
    var ulo = $("#dropdown1 ul");
    var ult = $("#dropdown2 ul");
    var uls = $("#dropdown3 ul");
    var ulf = $("#dropdown4 ul");
    if(uls.css("display")=="none"){
        uls.slideDown("fast");
        ult.slideUp("fast");
        ulo.slideUp("fast");
        ulf.slideUp("fast");
    }else{
        uls.slideUp("fast");
    }
}); 
 
   $("#dropdown4 p").click(function(){
    var ulo = $("#dropdown1 ul");
    var ult = $("#dropdown2 ul");
    var uls = $("#dropdown3 ul");
    var ulf = $("#dropdown4 ul");
    if(ulf.css("display")=="none"){ 
        ulf.slideDown("fast"); 
        ult.slideUp("fast");
        uls.slideUp("fast");
        ulo.slideUp("fast");
    }else{ 
        ulf.slideUp("fast"); 
    } 
}); 
 
</script>
        <script type="text/javascript">
            var pagecount= 1;
            var page = 1;

            function getlist()
            {
                page+=1;
                if(page<=pagecount)
                {
                    $.get("/mobile/first_recharge/lists/xxian?type=1&platform=m&page="+page, function(result){
                        if(result.status==1)
                        {
                            $(".shop-list").append(result.msg);
                        }
                    });
                }
                else
                {
                    $(".btn-more").html('没有更多了');
                    $(".btn-more").href('javascript:void(0);');

                }
            }

           function tijiao_price()
            {
                $('.shop-open').hide();
                $('.filter-mask').hide();
                var pri1 = document.getElementById('p0').value;
                var pri2 = document.getElementById('p1').value;

                if(pri1 != '' && !isNaN(pri1) && pri2 != '' && !isNaN(pri2))
                {
                    $.post('{:U('store_lists')}',{xiao:pri1,da:pri2}, function(data) {
                      if (data ==1) {
                        alert(3213214);
                      }

                    });
                }
            }
        </script>


<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>