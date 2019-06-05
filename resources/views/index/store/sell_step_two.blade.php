<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="qc:admins" content="340556612151736367">
<meta property="wb:webmaster" content="7acb0fd904d782ae">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no, email=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{$title}}</title>
<meta content="" name="keywords">
<meta content="" name="description">
<link type="text/css"  rel="stylesheet" href="{{asset('css')}}/sell/index.css" />
<link type="text/css" rel="stylesheet" href="{{asset('css')}}/sweetalert.css" />
<script async="" src="{{asset('js')}}/sell/analytics.js"></script>
<script src="{{asset('js')}}/sell/hm.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript" src="{{asset('js')}}/mui.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript" src="{{asset('js')}}/my.js"></script>
<script type="text/javascript" src="{{asset('js')}}/sweetalert.min.js"></script>
<style type="text/css">
    #hind ul li:nth-child(3n) {
         margin-right: 0;
    }
    .hind ul li{
         width: 90%;
         height: .6rem;
         text-align: center;
         line-height: .6rem;
         overflow: hidden;
         float:left;
         margin-left: 5%;
    }
    .hind ul li a{
         display:block;
    }

    .border {
        border: 1px solid #e8e8e8;
        margin-bottom: .2rem!important;
    }
    .hind .cla{
         width: 55%;
    /* height: 100%; */
    }
    .hind ul li.selected {
        border-color: #f75e46;
        background: url(#) no-repeat 100% 100%;
        background-size: 22%;
    }
</style>
</head>
<body>
<div class="app app-touch ">
    <div id="wrapper" class="mg001"><!---->
        <div class="mg_set_message">
            <div style="width: 2.5rem; height: 0px;"></div>
            <div>
                <div class="top-header border-bottom fixed-top">
                    <div  class="top-back"> <a href="javascript:history.go(-1)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回</a></div>
                    <h2  class="f36 color-000">{{$g_name}}(@if($game_info->game_id == 1)手游 @else H5 @endif )</h2>
                    <div class="top-right"><a href="#" class="back-home"></a></div>
                </div>
            </div>
            <div class="order-container mt-97 bg-fff color-000 f30 border-bottom">
                <span>商品类型</span> <span class="input">&nbsp;{{$st->trade_name}}</span>
            </div>
            <div class="order-container bg-fff f30 color-000  border-bottom">
                <span>游戏平台</span>
                <span class="input">{{$plat_info->plat_name}}</span>
            </div>
            <div class="order-container bg-fff f30 color-000  border-bottom">
                <span>游戏设备</span>
                <span class="input">{{$equip_info->e_name}}</span>
            </div>
            <div class="order-container bg-fff f30 color-000  border-bottom">
                <span>游戏区服</span>
                <span class="input">{{$qufu_name}}</span>
            </div>
            <form id="form" action="{{url('/store/sell_step_add')}}" onsubmit="return sb1();" method="post" enctype="multipart/form-data">
                <div  class="write_message_account">
                    <div  class="order-container bg-fff f30 color-000 mt-20 border-bottom border-top">
                        <span  class="span-icon-xinhao">商品名称</span>
                        <input  type="tel"   name="store_name" id="store_name" value="{{old('store_name')}}">
                    </div> <!---->
                    <div  class="order-container bg-fff f30 color-000 border-bottom">
                        <span  class="span-icon-xinhao">商品打折</span>
                        <input  type="tel" id="spinner" name="store_sale" id="store_sale" placeholder="请输入折扣值（1~9折）" >
                    </div>
                    <div  class="order-container bg-fff f30 color-000 border-bottom">
                        <span  class="span-icon-xinhao">出售价格</span>
                        <input m type="text" name="store_price" id="store_price" placeholder="请输打折后的价格（元）" >
                    </div>
                    <div id="tan" class="pt-10 pb-10 f26 p-20 clearfix">
                        <span  class="color-m1">信息越完整，售出越快</span>
                        <span id="cli" class="fr color-06c" >了解收费标准</span>
                    </div>
                </div>
                <div >
                    <div  class="order-container bg-fff f30 color-000 border-top " style="">
                        <div >
                            <span  >商品图片描述</span>
                            <div id="uploader-demo">
                                <!--用来存放item-->
                                <div id="fileList" class="uploader-list" style=""></div>
                                <div id="filePicker" >选择图片</div>
                            </div>
                        </div>
                    </div> <!---->
                </div>
                <div >
                    <div  class="order-container bg-fff f30 color-000 border-top " style="height:100px">
                        <div ><span  class="">商品补充描述</span>
                            <textarea  name="store_content" id="store_content" ></textarea>
                        </div>
                    </div> <!---->
                </div>
                <div >
                    <div  class="order-container bg-fff f30 color-000 border-top  mt-20">
                         <div >
                             <span  class="span-icon-xinhao">游戏帐号</span>
                             <input  maxlength="50" name="game_account" id="store_account" placeholder="请输入游戏帐号">
                         </div>
                    </div>
                </div>
                <div >
                    <div  class="order-container bg-fff f30 color-000 border-top ">
                        <div ><span  class="span-icon-xinhao">游戏密码</span>
                            <input  maxlength="50" name="game_password" id="store_password" placeholder="请输入游戏密码">
                        </div>
                    </div>
                </div>
                <div >
                    <div  class="order-container bg-fff f30 color-000 border-top ">
                        <div >
                            <span  class="span-icon-xinhao">角色名</span>
                            <input  maxlength="50" name="game_role" id="store_role" placeholder="请输入角色名">
                        </div>
                    </div>
                </div>
                <div>
                    <p  class="sec-tip mt-20 mb-20">本站所有信息经过安全加密，请安心填写</p>
                </div>
            <div class="text-center color-m1 line-h46 f30 py-20">信息请认真填写，提交后如需修改，请联系客服！</div>
            <div  class="release mt-20 trlect-btn border">
                <a data-v-60fbeafe href="" onclick="return sb1()" class="next">
                    <input  type="submit" id="sub"  name="" value="下一步" class="bg-f54">
                </a>
            </div>
            <input type="hidden" name="u_id" value="{{$u_id}}">
            <input type="hidden" name="trade_id" value="{{$trade_id}}">
            <input type="hidden" name="equipment_id" value="{{$e_id}}">
            <input type="hidden" name="plat_id" value="{{$plat_id}}">
            <input type="hidden" name="g_id" value="{{$g_id}}">
            <input type="hidden" name="game_type" value="{{$game_info->game_type}}">
            <input type="hidden" name="game_address" value="{{$qufu_name}}">
            {{ csrf_field() }}
        </form>
    </div>
    </div>
</div>
</body>
<script src="{{asset('js')}}/sell/polyfill.min.js"></script>
<script src="{{asset('js')}}/sell/jweixin-1.2.0.js"></script>
<script type="text/javascript">
function sb1(){
          var store_name = document.getElementById("store_name").value;
          var store_price = document.getElementById("store_price").value;
          var store_content = document.getElementById("store_content").value;
          var store_account = document.getElementById("store_account").value;
          var store_password = document.getElementById("store_password").value;
          var store_role = document.getElementById("store_role").value;
          if(store_name == ''){
                swal("商品名称不能为空！");
                return false;
            }
             if(store_price == ''){
                swal("商品价格不能为空！");
                return false;
            }
             if(store_content == ''){
                swal("商品描述不能为空！");
                return false;
            }
            if(store_account == ''){
                swal("商品描述不能为空！");
                return false;
            }
             if(store_password == ''){
                swal("商品描述不能为空！");
                return false;
            }
             if(store_role == ''){
                swal("角色名不能为空！");
                return false;
            }
                 return true;
}
</script>
<script type="text/javascript">
$("#hind .cla").click(function(){ 
        var ul = $("#hind ul"); 
    if(ul.css("display")=="none"){ 
        ul.slideDown("fast"); 
    }else{ 
        ul.slideUp("fast"); 
    } 
});
    $("#hind ul li a").click(function(){ 
    var txt = $(this).text(); 
    $("#hind .cla").html(txt).attr("style","padding-right:25px;padding-left:25px;color:#000"); 
    $("#hind input").attr("value",txt); 
    $("#hind ul").hide(); 
});

</script>
<script>
   $("#cli").click(function(){ 
      swal("免手续费!");
});
;</script>

<div class="mint-indicator" style="display: none;">
    <div class="mint-indicator-wrapper" style="padding: 15px;">
        <span class="mint-indicator-spin">
            <div class="mint-spinner-snake" style="border-top-color: rgb(204, 204, 204); border-left-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); height: 32px; width: 32px;"></div>
        </span> <span class="mint-indicator-text" style="display: none;">

    </span>
    </div>
    <div class="mint-indicator-mask"></div>
</div></body>
<script>

</script>
<script>
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: '{{$wx["appId"]}}', // 必填，公众号的唯一标识
        timestamp: '{{$wx["timestamp"]}}', // 必填，生成签名的时间戳
        nonceStr: '{{$wx["nonceStr"]}}', // 必填，生成签名的随机串
        signature: '{{$wx["signature"]}}',// 必填，签名
        jsApiList: ['chooseImage','uploadImage'] // 必填，需要使用的JS接口列表
    });
    wx.ready(function () {
        console.log('wx ready')

        wx.checkJsApi({
            jsApiList: ['chooseImage','uploadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function(res) {
                console.log("检查结果")
                console.log(res)
            },
            success: function (res) {
                console.log(JSON.stringify(res));
            }
        });




    }); //需在用户可能点击分享按钮前就先调用

    $("#filePicker").click(function(){
        wx.chooseImage({
            count: 5,
            needResult: 1,
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: function (data) {
                var localIds = data.localIds
                for ( var i = 0; i < localIds.length; i++){
                    console.log(localIds[i]);
                    $('#fileList').append('<div onclick="showPic(this)" style="display:inline-block;width=50px;height:50px"><img src="'+localIds[i]+'" style="width:50px;height:50px"/></div>');
                    wxuploadImage(localIds[i],i)
                }

                },
            fail: function (res) {
                alterShowMessage("操作提示", JSON.stringify(res), "1", "确定", "", "", "");
            }
        });
    })



    function wxuploadImage(localId,num){
        wx.uploadImage({
            localId: localId, // 需要上传的图片的本地ID，由chooseImage接口获得
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
                var serverId = res.serverId; // 返回图片的服务器端ID
                $('#form').append('<input type="hidden" name="img[]" value="'+serverId+'"/>')
            }
        });
    }
</script>
</html>