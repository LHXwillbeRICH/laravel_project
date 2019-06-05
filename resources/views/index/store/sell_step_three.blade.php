<!DOCTYPE html>
<!-- saved from url=(0513)https://m.5173.com/vue/sell/message-account?gameName=%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%28%E6%89%8B%E6%B8%B8%29&gameId=YX16082513452512600006&plantId=40c9692aede64b379aa4da7577e62b3a&clientId=a5aed6e9bf734a00b0d829887373dc89&serverId=13e61d6e87ac43188ac8b7d39da0e45a&goodsTypeId=2&goodsTypeName=%E6%B8%B8%E6%88%8F%E5%B8%90%E5%8F%B7&showServer=%E8%8B%B9%E6%9E%9C%2FQQ%28%E8%8B%B9%E6%9E%9C%29%2F%E6%89%8BQ1%E5%8C%BA%E8%8B%8D%E5%A4%A9%E7%BF%94%E9%BE%99&mainCatagoryId=76bae5aefec047e89bcb6aa4e417f138&customServer= -->
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
<link type="text/css" rel="stylesheet" href="{{asset('css')}}/sell/index.css" />
<script async="" src="{{asset('js')}}/sell/analytics.js"></script><script src="{{asset('js')}}/sell/hm.js"></script>
</head>
<body>
<div class="app app-touch "><div id="wrapper" class="mg001"><!---->
    <div class="mg_set_message"><div style="width: 2.5rem; height: 0px;"></div></div>
        <div>
            <div>
                <div class="fixedFill-mx"></div>
                <div class="top-header border-bottom fixed-top">
                    <div class="top-back"><a href="javascript:history.go(-1)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回</a></div>
                    <h2 class="f36 color-000">完善资料</h2>
                </div>
                 <form action="{:U('store_add')}" onsubmit="return sb1();" method="post" enctype="multipart/form-data">
                <div class="order-container px-30 bg-fff border-bottom">
                    <span class="span-icon-red-tip f32 color-000">为确保出售成功，请填写本人的联系方式</span>
                </div>
                <div class="order-container px-30 bg-fff border-bottom">
                    <span class="span-icon-xinhao f32 color-000">手机号</span>
                    <input maxlength="11" type="tel" name="store_tel" placeholder="请输入可以联系到您的手机号" class="f34 fontarial">
                </div> 
                <div class="order-container bg-fff border-bottom">
                    <span class="span-icon-xinhao f32 color-000">QQ号</span>
                    <input maxlength="11" type="tel" name="store_qq" placeholder="请输入可以联系到您的QQ号" class="f32 color-000 fontarial">
                </div> 
                 <div class="order-container bg-fff border-bottom">
                    <span class="span-icon-xinhao f32 color-000">微信账号</span>
                    <input  type="tel" name="store_zhifu"  class="f32 color-000 fontarial">
                </div> 

                        <input type="hidden" name="store_name" value="{$data['store_name']}">
                        <input type="hidden" name="g_id" value="{$data['g_id']}">
                        <input type="hidden" name="u_id" value="{$data['u_id']}">
                        <input type="hidden" name="store_type" value="{$data['store_type']}">
                        <input type="hidden" name="store_review" value="{$data['store_review']}">
                        <input type="hidden" name="store_price" value="{$data['store_price']}">
                        <input type="hidden" name="store_system" value="{$data['store_system']}">
                        <input type="hidden" name="store_sale" value="{$data['store_sale']}">
                        <input type="hidden" name="create_time" value="{$data['create_time']}">
                        <input type="hidden" name="store_number" value="{$data['store_number']}">
                        <input type="hidden" name="store_content" value="{$data['store_content']}">
                        <input type="hidden" name="store_address" value="{$data['store_address']}">
                        <input type="hidden" name="store_plat" value="{$data['store_plat']}">
                        <input type="hidden" name="store_role" value="{$data['store_role']}">
                        <input type="hidden" name="store_password" value="{$data['store_password']}">
                        <input type="hidden" name="store_account" value="{$data['store_account']}">
                        <input type="hidden" name="qufu_name" value="{$data['qufu_name']}">
                        <input type="hidden" name="store_game_type" value="{$data['game_type']}">
                        <input type="hidden" name="store_discount" value="{$data['store_discount']}">
                        <input type="hidden" name="img-0" value="{$data['img-0']}">
                        <input type="hidden" name="img-1" value="{$data['img-1']}">
                        <input type="hidden" name="img-2" value="{$data['img-2']}">
                        <input type="hidden" name="img-3" value="{$data['img-3']}">
                        <input type="hidden" name="img-4" value="{$data['img-4']}">
                        <input type="hidden" name="token" value="{$data['token']}">


                        <input type="hidden" name="store_email" value="{$data['store_email']}">
                        <input type="hidden" name="store_bqq" value="{$data['store_bqq']}">
                        <input type="hidden" name="store_dianhua" value="{$data['store_dianhua']}">
                        <input type="hidden" name="store_zhrz" value="{$data['store_zhrz']}">
                        <input type="hidden" name="store_zhlx" value="{$data['store_zhlx']}">
                        <input type="hidden" name="store_zhbd" value="{$data['store_zhbd']}">
                        <input type="hidden" name="store_fcm" value="{$data['store_fcm']}">
                        <input type="hidden" name="store_bdrl" value="{$data['store_bdrl']}">
                        <input type="hidden" name="store_zzb" value="{$data['store_zzb']}">




                <div class="text-center color-m1 line-h46 f30 py-20">信息请认真填写，提交后如需修改，请联系客服！</div>
                <div class="release mt-20 trlect-btn border">
                    <a href="JavaScript:void(0)" class="next"><input type="submit" name="" value="确认完成" class="bg-f54"></a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{asset('js')}}/sell//polyfill.min.js"></script>
<script src="{{asset('js')}}/sell/jweixin-1.2.0.js"></script>
<script type="text/javascript">
    
</script>
<div class="mint-indicator" style="display: none;">
    <div class="mint-indicator-wrapper" style="padding: 15px;">
        <span class="mint-indicator-spin">
            <div class="mint-spinner-snake" style="border-top-color: rgb(204, 204, 204); border-left-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); height: 32px; width: 32px;"></div>
        </span>
        <span class="mint-indicator-text" style="display: none;"></span>
    </div>
    <div class="mint-indicator-mask"></div>
</div>
</body></html>