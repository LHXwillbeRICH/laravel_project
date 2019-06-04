<!--底部-->
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
<link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
<link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
<script src="{{asset('js')}}/push.js"></script>
<script src="{{asset('js')}}/hm.js"></script>
<script src="{{asset('js')}}/push.js"></script>
<script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
<script type="text/javascript" src="{{asset('js')}}/baidu_js_push.js"></script>
<div class="footer">
	<div class="footer-nav">
		<a href="{:u('Index/index')}">首页</a>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=1051647297&site=qq&menu=yes">客服</a>
		<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=15b34ad546585f5a4141b7c5c5e296cc229cd8176a4fb6e8d8c67d4a7c388602">买家群</a>

		<a href="{:U('Public/indexHelp')}">帮助中心</a>
	</div>
	<div class="footer-con">
		<div class="footer-conbtn">
			<a href="">手机版</a>
		</div>
		<p>Copyright</p>
		<p> 2013-2017 www.shouchonghao.com 版权所有</p>
		<p> ICP证：京ICP备14049134号</p>

	</div>
</div>

<script type="text/javascript">
	window.onload = function() {
		mui('.mui-control-item').on('tap', 'a', function(e) {
			var URL = this.getAttribute('href');
			mui.openWindow({
				url: URL,
				id: URL,
				styles: {},
				show: {
					autoShow: true,
					aniShow: "slide-in-right",
					duration: 200
				},
				waiting: {
					autoShow: true, //自动显示等待框，默认为true
					title: '正在加载...', //等待对话框上显示的提示内容
				}
			});
		});
	}
</script>
<!--百度统计-->
<script type="text/javascript">
	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?2e6094947a8b0c06f87cbed81a84a553";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
<!--底部-->

<!--底部导航-->
<nav class="mui-bar mui-bar-tab footer-tab" id="mobile_navigate">
	<a class="mui-tab-item " href="{{url('/')}}">
		<span class="iconfont icon-shouye"></span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item " href="{{url('Buy/index')}}">
		<span class="iconfont icon-dingdan"></span>
		<span class="mui-tab-label">我要买</span>
	</a>
	<a class="mui-tab-item" href="{{url('store/index')}}">
		<span class="iconfont icon-woyaomai"></span>
		<span class="mui-tab-label">我要卖</span>
	</a>
	<a class="mui-tab-item " href="{{url('Personal/index')}}">
		<span class="iconfont icon-center"></span>
		<span class="mui-tab-label">个人中心</span>
	</a>
</nav>
<script type="text/javascript">
	window.onload = function() {
		mui('.mui-bar-tab').on('tap', 'a', function(e) {
			var URL = this.getAttribute('href');
			mui.openWindow({
				url: URL,
				id: URL,
				styles: {},
				show: {
					autoShow: true,
					aniShow: "slide-in-right",
					duration: 200
				},
				waiting: {
					autoShow: true, //自动显示等待框，默认为true
					title: '正在加载...', //等待对话框上显示的提示内容
				}
			});
		});
	}
</script>
<!--//底部导航-->