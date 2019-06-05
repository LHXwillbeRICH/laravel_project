<!DOCTYPE html>
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script type="text/javascript" src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/hm.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
</head>

<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
            <div class="mui-title">用户中心</div>
        </header>
        <!--//导航-->

        <!--用户中心-->
        <div class="commodity-details user-box">
                <div class="user-name">亲爱的<em>[{{$user['name']}}]</em>用户</div>
                <p class="user-yuan" style="width:9em; height:9em;"><img src="{{$user['img_url']}}"></p>
            <!--<p class="user-balance">账户余额</p>-->
            <!--<p class="user-balance-numb">0</p>-->
            <p class="user-btns"></p>
        </div>
        <!--//用户中心-->

        <!--消息-->
        <ul class="user-news">
            <li>

                <div class="user-news-con">
                 <a href="{{url('/Order/list',array('status'=>0))}}">
                    <p class="user-news-txt">全部</p>
                    </a>
                </div>
            </li>
            <li>

                <div class="user-news-con">
                 <a href="{{url('/Order/list',array('status'=>1))}}">

                    <p class="user-news-txt">未支付</p>
                     </a>
                </div>

            </li>
            <li>

                <div class="user-news-con">
                    <a href="{{url('/Order/list',array('status'=>3))}}">

                    <p class="user-news-txt">代收货</p>
                    </a>
                </div>

            </li>
            <li>

                <div class="user-news-con">
                    <a href="{{url('/Order/list',array('status'=>4))}}">

                    <p class="user-news-txt">交易成功</p>
                     </a>
                </div>

            </li>
        </ul>
        <div class="mui-table-view-cell user-list">
            <a class="iconfont icon-fanhui" href="{{url('/Order/list',array('status'=>0))}}"><i class="iconfont icon-dingdan"></i>全部订单<span>查看全部订单</span></a>
        </div>
        <!--消息-->

        <div class="m-top20">
            <div class="mui-table-view-cell user-list">
                <a class="iconfont icon-fanhui" href="{{url('/Personal/data')}}"><i class="iconfont icon-ziliao"></i>账号资料</a>
            </div>
            <div class="mui-table-view-cell user-list">
                <a class="iconfont icon-fanhui" href="{{url('/Personal/store_list')}}"><i class="iconfont icon-smrz-copy"></i>我的商品</a>
            </div>
            <div class="mui-table-view-cell user-list">
                <a class="iconfont icon-fanhui" href="{{url('/Personal/tixian')}}"><i class="iconfont icon-zhifubao"></i>申请提现</a>
            </div>
        </div>


        <div class="m-top20 user-last-con" style="margin-bottom: 0.2rem">
        <div class="mui-table-view-cell user-list">
            <a href="{{url('/Personal/change_phone_reset')}}" class="iconfont icon-fanhui"><i class="iconfont icon-shouji"></i>手机绑定</a>
        </div>

        <div class="mui-table-view-cell user-list">
            <a class="iconfont icon-fanhui logout_btn"  id="logout"><i class="iconfont icon-tuichu"></i>账号退出</a>
        </div>
    </div>
       @include('footer')

    </div>
</div>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>


<!--退出账号-->
<script>
    $(function(){
        $("#logout").click(function(){
            $.ajax({
                url:"/logout",
                data:{},//要用create方法，这里的列名就要和数据库中的列名一样，这里的首字母要大写。
                type:"GET",
                dataType:"TEXT",
                success: function(data){
                    obj = JSON.parse(data)
                    if(obj['code'] ==1){
                        mui.alert('退出成功!','提示','确定',function () {
                             location.href='http://www.shouchonghao.com';
                        });
                    }
                }
            })
        })
    })


</script>


</body></html>