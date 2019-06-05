<!DOCTYPE html>
<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="canonical" href="https://www.jiaoyitu.com/">
	<meta charset="utf-8">
	<title>{{$title}}</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="wap-font-scale" content="no">
    <meta name="browsermode" content="application">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('/css')}}/swiper.css">
	<!-- Swiper JS -->
    <script src="{{asset('/js')}}/swiper.js"></script>
</head>
<body>
<div class="body-wrap">
	<div class="mui-content">
		<!--导航-->
		<header class="mui-bar mui-bar-nav index-nav">
			<div class="logo"><img src="{{'/storage/images/logo'}}/logo.png"></div>

			<a href="{{url('Index/gameSearch')}}" class="search-nav">
				<span class="search-nav-txt">请输入游戏</span>
				<button type="submit" class="iconfont icon-sousuo"></button>
			</a>

		</header>
		<!--//导航-->

		<!--图片轮播-->
		<!-- Swiper -->
		<div class="swiper-container banners">
			<div class="swiper-wrapper bannerCon">
				@foreach($banner_list as $v)
					<div class="swiper-slide">
						<a href="{{$v->banner_url}}">
							<img src="{{asset('/storage')}}/{{$v->banner_img}}" style="width:100%; height:80%">
						</a>
					</div>
				@endforeach()
			</div>
		</div>
		<!--图片轮播-->


		<!--图文表格-->
		<div class="swiper-container tuwen">
	        <div class="swiper-wrapper tuwen_con">
	            <div class="swiper-slide">
        			<ul class="mui-table-view mui-grid-view " id="main_table1">
						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="http://www.shouchonghao.com/demo/example/jsapi.php">-->
							<a href="">
								<div class="main-table1-img main-table1-img1">
									<i class="iconfont icon-shouji"></i>
								</div>
								<div class="mui-media-body">手游首充</div>
							</a>
						</li>
			
						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Public/indexWeb')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img2">
									<i class="iconfont icon-wangyeyouxi"></i>
								</div>
								<div class="mui-media-body">客户端首充</div>
							</a>
						</li>
			
						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="indexRefill.html">-->
							<a href="">
								<div class="main-table1-img main-table1-img3">
									<i class="iconfont icon-chongzhi"></i>
								</div>
								<div class="mui-media-body">续充查询</div>
							</a>
						</li>

						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Public/indexHelp')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img4">
									<i class="iconfont icon-bangzhu"></i>
								</div>
								<div class="mui-media-body">帮助中心</div>
							</a>
						</li>

						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Power/index')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img1">
									<i class="iconfont icon-dailian"></i>
								</div>
								<div class="mui-media-body">代练</div>
							</a>
						</li>

						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Active/easy')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img2">
									<i class="iconfont icon-libao"></i>
								</div>
								<div class="mui-media-body">礼包</div>
							</a>
						</li>

						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Wzry/wzry')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img3">
									<i class="iconfont icon-wangzherongyao"></i>
								</div>
								<div class="mui-media-body">王者荣耀</div>
							</a>
						</li>

						<li class="mui-table-view-cell mui-media mui-col-xs-3">
							<!--<a href="{:U('Active/news')}">-->
							<a href="">
								<div class="main-table1-img main-table1-img4">
									<i class="iconfont icon-youxihuodong"></i>
								</div>
								<div class="mui-media-body">游戏活动</div>
							</a>
						</li>
						
					</ul>
	            </div>
	        </div>
	   </div>
		<!--//图文表格-->

		<!--热门手游-->
		<div class="main-mod m-top20">
			<div class="main-title"><i class="iconfont icon-shouji"></i>热门<em class="color1">手游</em><a href="{{url('Buy/index',['type'=>1])}}" class="more">更多+</a></div>
			<ul class="mui-table-view mui-grid-view main_table2">s
			@foreach($phone_h_list as $v)
					<li class="mui-table-view-cell mui-media mui-col-xs-3">
						<a href="{{url('/Buy/store_list',['id'=>$v->id])}}">
							<img class="mui-media-object" src="{{asset('/storage')}}/{{$v->game_logo}}">
							<div class="mui-media-body">
								<p class="gname">{{$v->game_name}}</p>
							</div>
						</a>
					</li>
			@endforeach
				
			</ul>
		</div>
		<!--//热门手游-->

		<!--热门端游-->
		<div class="main-mod m-top20">
			<div class="main-title"><i class="iconfont icon-wangyeyouxi"></i>热门<em class="color1">H5</em><a href="{{url('Buy/index',['type'=>2])}}" class="more">更多+</a></div>
			<ul class="mui-table-view mui-grid-view main_table3">
				@foreach($comp_h_list as $v)
					<li class="mui-table-view-cell mui-media mui-col-xs-3">
						<a href="{{url('/buy/detail',['id'=>$v->id])}}">
							<img class="mui-media-object" src="{{asset('/storage')}}/{{$v->game_logo}}">
							<div class="mui-media-body">
								<p class="gname">{{$v->game_name}}</p>
							</div>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		<!--//热门页游-->

		<!--最新商品-->
		<div class="main-mod m-top20 main-ul ">
			<div class="main-title"><i class="iconfont icon-youxi"></i>最新<em class="color1">商品</em></div>
			<ul class="mui-table-view">
				@foreach($store_list as $v)
					<li class="mui-table-view-cell">
						<a href="{{url('Buy/detail',array('id'=>$v->id))}}">
							<span class="game-tip">{{$v->store_name}}</span><span class="sale"><em class="color2">¥{{$v->RealPrice}}</em><em class="text-del">（{{$v->OldPrice}}元）</em></span></a>
					</li>
				@endforeach
			</ul>
		</div>
		@include ("footer" )<!--尾部-->
	</div>
</div>
</body>
<script type="text/javascript" src="{{asset('/js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('/js')}}/jquery.min.js"></script>


<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('.banners', {
        pagination : '.swiper-pagination',
		paginationClickable: true,
		spaceBetween: 50,
		centeredSlides: true,
        autoplay : 2000,
        autoplayDisableOnInteraction : true,
        loop : true,
        //autoHeight:true,

	});
</script>

<script>
	var swiper = new Swiper('.tuwen', {
		pagination: '.swiper-pagination',
		paginationClickable: true
	});
</script>



</html>