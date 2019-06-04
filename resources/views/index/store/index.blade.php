<!DOCTYPE html>
<!-- saved from url=(0034)https://m.5173.com/vue/sell-home/1 -->
<html lang="zh-cn">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta property="qc:admins" content="340556612151736367">
		<meta property="wb:webmaster" content="7acb0fd904d782ae">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no, email=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>趴着玩</title>
		<meta content="" name="keywords">
		<meta content="" name="description">

		<link type="text/css" rel="stylesheet" href="{{asset('css')}}/sell/index.css" />
		<link rel="stylesheet" href="{{asset('css')}}/swiper.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
		<!-- Swiper JS -->
		<script src="{{asset('js')}}/swiper.js"></script>
		<script src="{{asset('js')}}/push.js"></script>
		<script src="{{asset('js')}}/hm.js"></script>
		<script src="{{asset('js')}}/push1.js"></script>
		<script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
		<script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
		<script async="" src="{{asset('js')}}/sell/analytics.js"></script>
		<script src="{{asset('js')}}/sell/hm.js"></script>
	</head>
	<body>
		<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
		<div class="app app-touch ">
			<div id="wrapper" class="mg001">
				<div data-v-8b47c92c="">
					<div data-v-8b47c92c="" class="top-header border-bottom fixed-top header-bgsell">
						<!---->
						<h2 data-v-8b47c92c="" class="f36">我要卖</h2>
						<div data-v-8b47c92c="" class="top-right">
							<a data-v-8b47c92c="" href="https://m.5173.com/" class="back-home" style="display: none;"></a>
						</div>
						<div data-v-8b47c92c="" class="top-right">
							<a data-v-8b47c92c="" class="fl history"></a>
						</div>
					</div>
				</div>
				<div data-v-ab70c204="" id="wrapper" style="height: 100%;">
					<div data-v-ab70c204="" style="width: 3rem;"></div>
					<div data-v-ab70c204="" class="search-container fixed-top equipment-bg pb-15 pt-0" style="margin-top: 0.88rem; z-index: 61;">
			<a href="{url('index/gameSearch')}" class="search-navs">
				<span class="search-nav-txts">请输入游戏</span>
				<button type="submit" class="iconfont icon-sousuos"></button>
			</a>
						</div>
					</div>
					<div data-v-ab70c204="" class="search-game new-search-game" style="margin-top: 1.63rem;">
						<div data-v-ab70c204="" class="tab">
							<div data-v-ab70c204="" class="tab-head">
								<ul data-v-ab70c204="" class="tab-nav">
									<li data-v-ab70c204="" @if($type == 1)class="active" @endif>
										<a href="{{url('store/index',array('type'=>1))}}" class="sj" data-v-ab70c204="">手游</a>
									</li>
									<li data-v-ab70c204="" @if($type == 2)class="active" @endif>
										<a href="{{url('store/index',array('type'=>2))}}" class="dn router-link-active" data-v-ab70c204="">H5游戏</a>
									</li>
								</ul>
							</div>
							<div data-v-ab70c204="" class="tab-body">
								<div data-v-ab70c204="" class="tab-panel active">
									<div data-v-ab70c204="" class="tab-class01 new-sell-game-list">
										<div data-v-3d7cbfe2="" data-v-ab70c204="">
											<div data-v-3d7cbfe2="" style="height: 625.5px;">
												<div data-v-3d7cbfe2="" infinite-scroll-disabled="loading" infinite-scroll-immediate-check="test" infinite-scroll-distance="600">
													<ul data-v-ab70c204="" data-v-3d7cbfe2="" style="background-color: white;">
														@foreach($game_list as $k=>$v)
															<li data-v-ab70c204="" data-v-3d7cbfe2="">
																<a href="{{url('store/sell_step_one',array('id'=>$v['id']))}}" class="" data-v-ab70c204="" data-v-3d7cbfe2="">
																	<center data-v-ab70c204="">
																		<img data-v-ab70c204="" src="{{asset('storage')}}/{{$v->game_logo}}" class="null loaded">
																	</center>
																	<p data-v-ab70c204="">{{$v->game_name}}</p>
																</a>
															</li>
														@endforeach

														<div data-v-ab70c204="" data-v-3d7cbfe2="" style="clear: both;"></div>
													</ul>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div data-v-71ff2779="" data-v-ab70c204="">
						<a data-v-71ff2779="" id="BackToTop" style="display: none;"></a>
					</div>
					<div data-v-cdac9110="" data-v-ab70c204="">
					@include ("footer" )<!--尾部-->
						<!--尾部-->
					</div>
				</div>
			</div>
		<script src="{{asset('js/sell')}}/polyfill.min.js"></script>
		<script src="{{asset('js/sell')}}/jweixin-1.2.0.js"></script>

		<script>
			//获取URL参数
			function getUrlParam(name) {
				var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if(r != null) return decodeURI(r[2]);
				return null; //返回参数值
			};

			//设置cookie
			function setCookie(cname, cvalue, path, options, domain) {
				var d = new Date();
				var exdays = 30;
				if(options) {
					exdays = options;
				};
				d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				var expires = "expires=" + d.toUTCString();
				if(domain) {
					expires = expires + ";domain=" + domain
				}
				document.cookie = cname + "=" + cvalue + ";path=" + path + ";" + expires;
			}; //
		</script>

		<script type="text/javascript">
			NTKF_PARAM = { siteid: "bq_1000", settingid: "bq_1000_1472795888825", uid: "", uname: "", isvip: "0", userlevel: "1", erpparam: "abc" }
		</script>
		<script type="text/javascript" src="{{asset('js/sell')}}/ntkfstat.js" charset="utf-8"></script>
	</body>

</html>