<!DOCTYPE html>
<!-- saved from url=(0073)https://m.jiaoyitu.com/search/index/?keywords=%E9%95%87%E9%AD%94%E6%9B%B2 -->
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="canonical" href="https://www.jiaoyitu.com/search/index">
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="keywords" content="{{$title}}">
    <meta name="description" content="{{$title}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script type="text/javascript" src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/hm.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
</head>

<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
            <div class="mui-title">搜索</div>
        </header>
        <!--//导航-->

       <!--搜索-->
        <form action="{{url('Index/gameSearch')}}" method="post">
            <div class="search">
                <input name="game_name" type="text"  value="" class="search-txt" placeholder="请输入您想要搜索的内容">
                {{csrf_field()}}
                <input type="submit" class="search-btn" value="搜 索">
            </div>
        </form>
        <!--//搜索-->

        <!--搜索结果-->
        @if(!empty(json_decode(json_encode($game_list),true)))
        @foreach($game_list as $k=> $v)
        <ul class="shop-list m-top20">
            <li class="shop-list-title"><em class="color4"></em><span>
                    @if($k == 1)手机游戏 @else 网页游戏 @endif</span>共{{count($v)}}条搜索信息</li>
                    @foreach($v as $value)
                    <li class="clearfix">
                        <div class="jg-img">
                            <img src="{{asset('/storage')}}/{{$value['game_logo']}}" />
                        </div>
                        <div class="jg-txt">
                            <p>{{$value['game_name']}}</p>
                            <p class="jg-txt-a">
                                <a href="{{url('Buy/store_list',array('id'=>$value->id))}}">点击进入</a>
                                <!--<a href="https://m.jiaoyitu.com/proxy_recharge/lists/zmq/">苹果代充</a>-->
                            </p>
                        </div>
                    </li>
                    @endforeach
        </ul>
        @endforeach
        @endif
        <!--搜索结果-->
        <!--底部-->
        <include file="Public/footer" />
<script type="text/javascript">
  window.onload=function () {
      mui('.mui-bar-tab').on('tap','a',function (e) {
          var URL = this.getAttribute('href');
          mui.openWindow({
              url:URL,
              id:URL,
              styles:{},
              show:{
                  autoShow:true,
                  aniShow:"slide-in-right",
                  duration:200
              },
              waiting:{
                  autoShow:true,//自动显示等待框，默认为true
                  title:'正在加载...',//等待对话框上显示的提示内容
              }
          });
      });
  }
</script>        <!--//底部导航-->
    </div>


</div>

<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('js')}}/iscroll.js"></script>
<script type="text/javascript" src="{{asset('js')}}/navbarscroll.js"></script>
<script type="text/javascript">
    $(function(){
        var sy_list_page=1;
        var yy_list_page=1;
        var sy_max_page=1;
        var yy_max_page=0;

        //异步加载更多手游
        $('#more_sy_list').click(function () {
            sy_list_page+=1;
            if(sy_list_page>sy_max_page) {
                $('.shop-list-btn').hide();
            }
            $.get("https://m.jiaoyitu.com/search/?sy_page="+sy_list_page+"&keywords=镇魔曲", function (result) {
                $('.shop-list-btn:first').before(result);
            })
        });

        //异步加载更多页游
        $('#more_yy_list').click(function () {
            yy_list_page+=1;
            if(yy_list_page>yy_max_page) {
                $('.shop-list-btn:last').hide();
            }
            $.get("https://m.jiaoyitu.com/search/?yy_page="+yy_list_page+"&keywords=镇魔曲", function (result) {
                $('.shop-list-btn:last').before(result);
            })
        });



    });

</script>



<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>