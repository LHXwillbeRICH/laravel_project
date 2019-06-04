<!DOCTYPE html>
<!-- saved from url=(0040)https://m.jiaoyitu.com/game_sch_sy/4005/ -->
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="canonical" href="https://www.jiaoyitu.com/game_sch_sy/4005">
		
		<title>首充号123</title>
		<meta name="keywords" content="王者传奇,王者传奇首充号,王者传奇交易平台,首充号交易平台,手游首充号,交易兔首充号,手游交易平台,交易兔">
		<meta name="description" content="交易兔（www.jiaoyitu.com）王者传奇首充号安卓【72G】3.8元。安全、高效、免手续费的手游交易平台就上_交易兔！">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/swiper.css">
        <style type="text/css">
            .text-red{
                color:red;
            }
        </style>
    <script src="{{asset('js')}}/hm.js"></script>
    <script src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/swiper.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
</head>

	<body>
		<div class="body-wrap">
			<div class="mui-content">
				<!--导航-->
				<header class="mui-bar mui-bar-nav page-nav">
					<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
					<div class="mui-title">{{$store_info->store_name}}</div>
				</header>
				<!--//导航-->

				<!--商品详情 commodity-->

				<div class="commodity main-mod">
					<p class="commodity-title">{{$store_info->store_name}}</p>
					<p class="commodity-price"><em class="color3">¥{{$store_info->RealPrice}}</em>(原价：¥{{$store_info->OldPrice}})</p>
					<div class="commodity-discount">
						<div class="discount-sc">{{$store_info->store_sale}}折</div>
						<!--<div class="discount-xc">续充3.8折</div>-->
					</div>
                    <a href="{{$store_info->download}}" class="btn-download btn-confirm"><i class="iconfont icon-xiazai"></i>下载游戏</a>
					
				</div>
				<!--//商品详情-->
				
				<!--商品信息-->
				<div class="commodity-info main-mod">
					<ul>
						<li>商品编号:<span class="commodity-explain">{{$store_info->store_code}}</span></li>
						<li>游戏平台:<span class="commodity-explain">{{$store_info->platInfo->plat_name}}</span></li>
                        <li>游戏区服:<span class="commodity-explain">{{$store_info->game_address}}</span></li>
						<li>商品类型:<span class="commodity-explain">{{$store_info->tradeInfo->trade_name}}
                        </span></li>
                        
                            <!-- <if condition= "empty($store_info['store_account']) neq true">
                                <li>游戏账号:<span class="commodity-explain">{$store_info.store_account} </span></li>
                            </if> -->
                            <!-- <if condition= "empty($store_info['store_role']) neq true"> -->
                                <li>角色名:<span class="commodity-explain">{{$store_info->game_role}} </span></li>
                            </if>
                            
						<!-- <li>游戏运营:<span class="commodity-explain">{$store_info.user_name}</span></li> -->
						
						<!-- <li>保障服务：<em class="tip-shi" title="卖家已完成实名认证">实</em>
                        <em class="tip-ji" title="自动发货秒收账号密码">极</em><em class="tip-ji" title="24小时自动续充发货">续</em></li> -->
					</ul>
				</div>
				<!--//单品信息-->

				<!--商品描述-->
				<div class="commodity-describe m-top20">
					<div class="commodity-describe-tit">
						<a href="javascript:void(0);" class="active">商品图片</a>
						<a href="javascript:void(0);" class="">商品描述</a>
	                	<a href="javascript:void(0);" class="">购买帮助</a>
                	</div>
                	<div class="commodity-describe-con">
						<div class="swiper-container" >
							<div class="swiper-wrapper">
								@foreach($store_info->StoreImgInfo as $v)
									<div class="swiper-slide" style="text-align:center">
										<img src="{{'http://'.$_SERVER['HTTP_HOST'].'/'.$v->img_url}}" style="width:300px;height:500px"/>
									</div>
								@endforeach
							</div>
							<div class="swiper-pagination"></div><!--分页器。如果放置在swiper-container外面，需要自定义样式。-->
						</div>
                		<div class="commodity-ms commodity-txt" style="display: none;">
                            游戏介绍：{{$store_info->store_content}}
                        </div>
                		<div class="commodity-heip commodity-txt" style="display: none;">
							<b>购买流程:</b><br>
							<div>1. 下单支付</div>
<span class="text-red"></span>客服开始验号，请等待</b><br>
<div>2. 等待发货</div>
客服开始验号，截图给买家确认是否继续购买，客服进行改密、换绑<span style="color:red">【重要】帐号交易不使用QQ沟通，谨防骗子！</span><br>
						<div>3. 买家收货</div>
							<span>进入【个人中心>我的订单】查看帐号密码</span><br>
						<div>4. 确认收货</div>
							<span>待买家确认收货（登录游戏验证、改密等）</span><br>
						<div>5. 卖家收款</div>
							<span>买家已确认收货，交易猫转账给卖家</span><br>
						<div>6. 交易成功</div>
							<span>卖家收到货款，交易完成</span><br>
<div style="color:red">
	免责声明：<br>
	1.所展示的商品供求信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。<br>
	2.帐号真实情况以客服截图为准。<br>
	3.国家法律规定，未成年人不能参与虚拟物品交易。<br>
	4.本平台提供的数字化商品根据商品性质不支持七天无理由退货服务。<br>
</div>
						</div>
                	</div>
				</div>
				<!--//商品描述-->
				
				
				
				<!--底部-->
				<div class="footer">
   <div class="footer-nav">
        <a href="{{url('/')}}">首页</a>
        <a href="http://wpa.qq.com/msgrd?v=3&uin=1051647297&site=qq&menu=yes">客服</a>
        <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=15b34ad546585f5a4141b7c5c5e296cc229cd8176a4fb6e8d8c67d4a7c388602">买家群</a>

        <a href="{{url('public/help')}}">帮助中心</a>
    </div>
   <div class="footer-con">
        <div class="footer-conbtn">
           <a href="https://m.jiaoyitu.com/">手机版</a>
        </div>
         <p>趴着玩网络技术有限公司</p>
        <p>湖北省武汉市洪山区街10号中石大厦A栋5楼西区</p>
        <p>版权所有 © www.pazhewan.com 鄂ICP备12010420号-9</p>

    </div>
</div>

<script type="text/javascript">
    window.onload=function () {
        mui('.mui-control-item').on('tap','a',function (e) {
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
</script>

		<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
		<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>

	<script type="text/javascript">
		$(function(){
			$(".commodity-describe-tit a").mouseover(function(){
				var i = $(this).index();
				$(this).addClass("active").siblings().removeClass("active");
				$(".commodity-describe-con").children('div').eq(i).show().siblings('.commodity-describe-con div').hide();
			});

			/* 收藏和取消收藏 */
			$('.favorite-btn').click(function(){
                $.ajax({
                    cache: true,
                    type: "POST",
                    url:'https://m.jiaoyitu.com/ucenter/togglecollectgoods/',
                    data:{
                        goodsId:4005                    },
                    async: false,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        if(data.msg=='ok'){
                            if($('.favorite-btn').text()=='收藏商品'){
                                $('.favorite-btn').text('已收藏');
                            }else{
                                $('.favorite-btn').text('收藏商品');
                            }
                        }else{
                            mui.alert(data.msg);
                        }
                    }
                });
            });

		})



	</script>
				<!--底部价格区-->
				<div class="foot-price" style="z-index:9999">
					<em class="foot-number">¥{{$store_info->RealPrice}}</em>(原价：¥{{$store_info->OldPrice}})
					<!--                                             <a href="javascript:;" class="btn-ljsc favorite-btn">收藏商品</a>
                                         -->
					<a href="{{url('Buy/order',array('id'=>$store_info->id))}}" class="btn-ljgm">立即购买</a>
				</div>
				<!--//底部价格-->
	<script>
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: '{{$appId}}', // 必填，公众号的唯一标识
            timestamp: '{{$timestamp}}', // 必填，生成签名的时间戳
            nonceStr: '{{$nonceStr}}', // 必填，生成签名的随机串
            signature: '{{$signature}}',// 必填，签名
            jsApiList: ['updateAppMessageShareData','updateTimelineShareData'] // 必填，需要使用的JS接口列表
        });
        wx.error(function (res) {
			console.log("error:")
			console.log(res)
        });
        wx.ready(function () {

            wx.updateAppMessageShareData({
                title: '{{$store_info->store_name}}', // 分享标题
                desc: '{{$store_info->store_content}}', // 分享描述
                link: '{{$url}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                imgUrl: 'http://www.shouchonghao.com/storage/{{$store_info->gameInfo->game_logo}}', // 分享图标分
                success: function () {
                    console.log('share success')
                },
                fail: function(){
                    console.log('share fail')
                },
                complete: function(){
                    console.log('share complete')
                }
            })

            wx.updateTimelineShareData({
                title: '{{$store_info->store_name}}', // 分享标题
                desc: '{{$store_info->store_content}}', // 分享描述
                link: '{{$url}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                imgUrl: 'http://www.shouchonghao.com/storage/{{$store_info->gameInfo->game_logo}}', // 分享图标分
                success: function () {
                    // 设置成功
                }
            })

		}); //需在用户可能点击分享按钮前就先调用



	</script>
	<script>
        var Swiper = new Swiper ('.swiper-container', {
            //direction: 'vertical', // 垂直切换选项
            autoplay : 2000,
            autoplayDisableOnInteraction : true,
            loop : true,
            pagination: {
                el: '.swiper-pagination',
            },
           /* // 如果需要滚动条
            scrollbar: {
                el: '.swiper-scrollbar',
            },*/
        })
	</script>
</body></html>