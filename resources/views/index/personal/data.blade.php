<!DOCTYPE html>

<html style="font-size: 100px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>账号资料|趴着玩|www.shouchonghao.com</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/mui.picker.min.css" >
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jytM_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/iconfont.css">
    <script type="text/javascript" src="{{asset('js')}}/push.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/adaptation.js"></script>
</head>

<body>
<div class="body-wrap">
    <div class="mui-content">
        <!--导航-->
        <header class="mui-bar mui-bar-nav page-nav">
            <a href="{{url('/Personal/index')}}" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left iconfont icon-fanhui"></a>
            <div class="mui-title">账号资料</div>
        </header>
        <!--//导航-->


        <div class="write-info m-top20 user-info">
            <!--用户资料修改-->
            <div >
                <form id="order_form" action="{{url('Personal/dataEdit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="mui-input-row">
                        <label>微信昵称</label>
                        <input type="text" placeholder="" name="nickname" value="{{$user->nickname}}">
                    </div>
                    <div class="mui-input-row">
                        <label>实际姓名</label>
                        <input type="text" placeholder="" name="realname" value="{{$user->realname}}">
                    </div>
                    <div style="border: 1px solid #bbbbbb; height: 0.9rem; line-height: 0.9rem;margin : 0 0 19px 0"  >
                        <label style="   font-size: 0.28rem; height: 0.9rem; line-height: 0.9rem; margin-left: 0.2rem;width: 30%;">性别</label>
                        <div style="display: inline;margin-left: 1.3rem;">
                            @if($user->sex == 1)
                                <input type="radio" name="sex" checked="checked" value="1" />  男
                                <input type="radio" name="sex" value="2" />  女
                               @else
                                <input type="radio" name="sex" value="1" />  男
                                <input type="radio" name="sex" checked="checked" value="2" />  女
                            @endif
                        </div>
                    </div>

                    <div class="mui-input-row">
                        <label>QQ</label>
                        <input type="text" placeholder="" name="qq" value="{{$user->qq}}">
                    </div>
                    {{--<div class="mui-input-row">--}}
                        {{--<label>手机号</label>--}}
                        {{--<input type="text" placeholder="" name="phone" value="{{$user->phone}}">--}}
                    {{--</div>--}}

                   {{-- <div class="mui-input-row">
                        <label>所在地</label>
                        <input type="hidden" name="province" value="{$list.user_address|msubstr=0,3,'utf-8',false}">
                        <input type="hidden" name="city" value="{$list.user_address|msubstr=3,6,'utf-8',false}">
                        <input type="text" id="showCityPicker" placeholder="" value="{$list.user_address}">
                    </div>--}}


                    {{--<div class="mui-input-row">
                        <label>选择头像</label>
                        <input type="hidden" name="userimg" value="{$list.user_img}">
                        <input type="file" class="text input-file" name="user_img" value="{$list.user_img}">
                    </div>--}}
                   <!--  <div style="background: #f29500;display: block;text-align: center;color: #fff;border-radius: 0.05rem;width: 100%;height: 0.9rem;line-height: 0.9rem;">
                       <input type="submit" name="submit" style="font-size: 1.5em;background: #f29500; margin-top: 8px;border:none"  value="保存">
                   </div> -->
                    
                        <input style="background: #f29500;display: block;text-align: center;color: #fff;border-radius: 0.05rem;width: 100%;height: 0.9rem;line-height: 0.9rem;font-size:1.5em;" type="submit" name="submit" >
                  

                </form>

            </div>
            <!--用户资料修改-->
        </div>
        <!--底部导航-->
        <nav class="mui-bar mui-bar-tab footer-tab" id="mobile_navigate">
            @include('footer')
        </nav>
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
        </script>       <!--//底部导航-->
    </div>
</div>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/mui.picker.min.js"></script>

<script type="text/javascript" src="{{asset('js')}}/datePicker.js"></script>
<script type="text/javascript" src="{{asset('js')}}/city.data.js"></script>
<script type="text/javascript">
    var calendar = new datePicker();
    calendar.init({
        'trigger': '#demo1',
        /*按钮选择器，用于触发弹出插件*/
        'type': 'date',
        /*模式：date日期；datetime日期时间；time时间；ym年月；*/
        'minDate': '1900-1-1',
        /*最小日期*/
        'maxDate': '2100-12-31',
        /*最大日期*/
        'onSubmit': function () { /*确认时触发事件*/
            var theSelectData = calendar.value;
        },
        'onClose': function () { /*取消时触发事件*/
        }
    });
    /**
     * 城市二级联动
     * @author storm hi@yumufeng.com
     * @type {mui.PopPicker}
     */
    var cityPicker = new mui.PopPicker({
        layer: 2
    });
    cityPicker.setData(cityData);
    var showCityPickerButton = document.getElementById('showCityPicker');
    showCityPickerButton.addEventListener('tap',function (e) {
        cityPicker.show(function(items) {
            $("input[name='province']").val(items[0].text);
            $("input[name='city']").val(items[1].text);
            showCityPickerButton.value = items[0].text + "-" + items[1].text;
            //返回 false 可以阻止选择框的关闭
            //return false;
        });
    },false);
    /**
     * 切换性别按钮
     */
    document.getElementById('mySwitch').addEventListener('toggle', function(event) {
        $("input[name='sex']").val(event.detail.isActive ? '0' : '1');
    });

    $('.need-editor').on('touchstart',function (e) {
        $('.my-edit-info').toggleClass('mui-hidden');
    });

    $('.my-edit-info-btn').click(function () {
        $.ajax({
            cache: true,
            type: "POST",
            url:'{:U("Personal/data")}',
            data:$('#order_form').serialize(),
            async: false,
            error: function(request) {
                mui.alert("Connection error");
            },
            success: function(data) {
                if(data =='修改成功'){
                    mui.alert('修改成功','提示','确定',function () {
                        location.href='data';
                    });
                }else {
                    alert(data);
                }
            }
        });
    })

</script><div class="mui-poppicker">        <div class="mui-poppicker-header">          <button class="mui-btn mui-poppicker-btn-cancel">取消</button>            <button class="mui-btn mui-btn-blue mui-poppicker-btn-ok">确定</button>           <div class="mui-poppicker-clear"></div>     </div>      <div class="mui-poppicker-body">        <div class="mui-picker" style="width: 50%;">        <div class="mui-picker-inner">          <div class="mui-pciker-rule mui-pciker-rule-ft"></div>          <ul class="mui-pciker-list" style="transform: perspective(1000px) rotateY(0deg) rotateX(0deg);"><li class="highlight" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(0deg);">北京市</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-20deg);">天津市</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-40deg);">河北省</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-60deg);">山西省</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-80deg);">内蒙古</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-100deg);">辽宁省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-120deg);">吉林省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-140deg);">黑龙江省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-160deg);">上海市</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-180deg);">江苏省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-200deg);">浙江省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-220deg);">安徽省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-240deg);">福建省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-260deg);">江西省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-280deg);">山东省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-300deg);">河南省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-320deg);">湖北省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-340deg);">湖南省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-360deg);">广东省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-380deg);">广西壮族</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-400deg);">海南省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-420deg);">重庆</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-440deg);">四川省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-460deg);">贵州省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-480deg);">云南省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-500deg);">西藏</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-520deg);">陕西省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-540deg);">甘肃省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-560deg);">青海省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-580deg);">宁夏</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-600deg);">新疆</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-620deg);">台湾省</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-640deg);">香港</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-660deg);">澳门</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-680deg);">海外</li></ul>          <div class="mui-pciker-rule mui-pciker-rule-bg"></div>      </div>  </div><div class="mui-picker" style="width: 50%;">      <div class="mui-picker-inner">          <div class="mui-pciker-rule mui-pciker-rule-ft"></div>          <ul class="mui-pciker-list" style="transform: perspective(1000px) rotateY(0deg) rotateX(0deg);"><li class="highlight" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(0deg);">东城区</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-20deg);">西城区</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-40deg);">崇文区</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-60deg);">宣武区</li><li class="visible" style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-80deg);">朝阳区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-100deg);">丰台区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-120deg);">石景山区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-140deg);">海淀区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-160deg);">门头沟区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-180deg);">房山区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-200deg);">通州区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-220deg);">顺义区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-240deg);">昌平区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-260deg);">大兴区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-280deg);">怀柔区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-300deg);">平谷区</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-320deg);">密云县</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-340deg);">延庆县</li><li style="transform-origin: center center -89.5px; transform: translateZ(89.5px) rotateX(-360deg);">其它区</li></ul>           <div class="mui-pciker-rule mui-pciker-rule-bg"></div>      </div>  </div></div>    </div>


<div style="position: static; display: none; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>