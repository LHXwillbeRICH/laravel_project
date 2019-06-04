<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta property="qc:admins" content="340556612151736367">
  <meta property="wb:webmaster" content="7acb0fd904d782ae">
  
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no, email=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>我要卖</title>
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link type="text/css" rel="stylesheet" href="{{asset('css')}}/sell/index.css" />
  <link type="text/css" rel="stylesheet" href="{{asset('css')}}/sweetalert.css" />
  <script async="" src="{{asset('js')}}/sell/analytics.js"></script>
  <script src="{{asset('js')}}/sell/hm.js">
  </script><script type="text/javascript" src="{{asset('js')}}/sell/sensorsdata.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/sweetalert.min.js"></script>

</head>
<body>
<form action="{{url('/store/sell_step_two')}}" method="post">
<div class="app app-touch ">
    <div id="wrapper" class="mg001"><!---->
        <div>
            <div class="top-header border-bottom fixed-top">
                <div class="top-back">
                    <a href="javascript:history.go(-1)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回</a>
                </div>
                <h2 class="f36 color-000">{{$game_info->game_name}}(手游)</h2>
                <div class="top-right">
                    <a href="https://m.5173.com/index.html" class="back-home"></a>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="p-30 bg-fff mt-97 f30 border-bottom fw">
                <span class="f32 span-icon-xinhao color-000">商品类型</span>
            </div>
            <div id="sed" class="px-30 pt-30 pb-10 bg-fff border-bottom publish-type new-publish-type f30 clearfix fw">
                <input type="hidden" class="types" name="trade_id" value="">
                <ul id="tu">
                    @foreach($trade_info as $k=>$v)
                        <li name="leixing" id="tl{{$k}}" value="{{$v->id}}" class="border mb-20 color-000 fl">{{$v->trade_name}}</li>
                    @endforeach
                </ul>
            </div>
            <div  class="p-30 bg-fff border-top mt-20 f30 border-bottom fw">
                <span class="f32 span-icon-xinhao color-000">设备</span>
            </div>
            <div id="ped" class="px-30 pt-30 pb-10 bg-fff border-bottom publish-type new-publish-type f30 clearfix fw">
                <input type="hidden" class="eforma" name="e_id" value="{{$type}}">
                <ul id="eq">
                    @foreach($einfo as $k=>$v)
                        <li name="flat" id="el{{$k}}" value="{{$v['e_id']}}"  class="border mb-20 color-000 fl @if($k==0) selected @endif" >{{$v['e_name']}}</li>
                    @endforeach
                </ul>
            </div>
            <div  class="p-30 bg-fff border-top mt-20 f30 border-bottom fw">
                <span class="f32 span-icon-xinhao color-000">平台</span>
            </div>
            <div id="equipment" class="px-30 pt-30 pb-10 bg-fff border-bottom publish-type new-publish-type f30 clearfix fw">
                <input type="hidden" class="platforma" name="plat_id" value="">
                <ul id="pu">
                    @foreach($pinfo as $k=>$v)
                        <li name="flat" id="pl{{$k}}" value="{{$v['p_id']}}" class="border mb-20 color-000 fl " onclick="aa(this)">{{$v['plat_name']}}</li>
                    @endforeach
                </ul>
            </div>
            <!--   游戏id      --><input type="hidden" id="g_id" name="g_id" value="{{$game_info->id}}"  />
            <!--   游戏id      --><input type="hidden" id="g_name" name="g_name" value="{{$game_info->game_name}}"  />
            <div class="p-30 bg-fff border-top mt-20 f30 border-bottom fw">
                <span class="f32 span-icon-xinhao color-000">所属服务器</span>
            </div>
            <div id="ser" class="px-30 pt-30 pb-10 bg-fff border-bottom publish-type new-publish-type f30 clearfix fw">
                <ul id="qu">
                    <li name="qufu" id="ql{$key}" value="{$menu.id}" class="border mb-20 color-000 fl">
                        <input  type="text" class="service" name="qufu_name" value="{{old('qufu_name')}}">
                    </li>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    <div class="text-center color-m1 line-h46 f30 py-20">&nbsp;</div>
    <div  class="release mt-20 trlect-btn border">
        <a data-v-60fbeafe href="" onclick="return sb1()" class="next">
            <input  type="submit" id="sub"  name="" value="下一步" class="bg-f54">
        </a>
    </div>
    </div>
</div>
</form>
<script src="{{asset('js')}}/sell/polyfill.min.js"></script>
<script src="{{asset('js')}}/sell/jweixin-1.2.0.js"></script>
<script src="{{asset('js')}}/jquery.js"></script>
<script>  
$(function(){
    $("#tu li").click(function(){
        var txt = $(this).text();
        var i=0; 
        var a=$("#tu").children('li').length;
        var b= $(this).attr('id');  
        var tid=$(this).attr("value");
       for(i;i<a;i++){
            if("tl"+i ==b){
               if($("#"+b).hasClass('selected')==true){
                    $("#tu #"+b).attr("class","border mb-20 color-000 fl"); 
                    $("#sed .types").attr("value","");
                }else{
                    $("#tu #"+b).attr("class","border mb-20 color-000 fl selected");
                    $("#sed .types").attr("value",tid);  
                }  
            }else{
               $("#tu #tl"+i).attr("class","border mb-20 color-000 fl"); 
            }
       }
    });


    $("#eq li").click(function(){
        var a=$("#eq").children('li').length;
        var b= $(this).attr('id');
        var gid=$('#g_id').attr('value');
        var eid=$(this).attr("value");
        var i=0;
       for(i;i<a;i++){
            if("el"+i == b){
               if($("#"+b).hasClass('selected')==true){
                    $("#eq #"+b).attr("class","border mb-20 color-000 fl");
                    $("#ped .eforma").attr("value","");
                }else{
                    $("#eq #"+b).attr("class","border mb-20 color-000 fl selected");
                    $("#ped .eforma").attr("value",eid);
                    $.ajax({
                        url:'/store/ajax/'+gid+'/'+eid,
                        dataType:'json',
                        success:function($res){
                            var str = '';
                            $.each($res,function(i,item){
                                str +="<li name='flat' id='pl"+i+"' value='"+item['p_id']+"' class='border mb-20 color-000 fl ' onclick='aa(this)' >"+item['plat_name']+" </li>";
                            });
                            $('#pu').empty();
                            $('#pu').append(str);

                            console.log(str);
                        },
                        error:function($res){
                            alert('aaaaa');
                        }
                    });
                }
            }else{
               $("#eq #el"+i).attr("class","border mb-20 color-000 fl");
            }
       }
    });

     $("#qu li").click(function(){
               
        var a=$("#qu").children('li').length;
        var b= $(this).attr('id');  
        var tid=$(this).attr("value");  
        var i=0; 
       for(i;i<a;i++){ 
            if("ql"+i ==b){
               if($("#"+b).hasClass('selected')==true){
                    $("#qu #"+b).attr("class","border mb-20 color-000 fl"); 
                    $("#ser .service").attr("value","");
                }else{
                    $("#qu #"+b).attr("class","border mb-20 color-000 fl selected");
                    $("#ser .service").attr("value",tid);  
                }  
            }else{
               $("#qu #ql"+i).attr("class","border mb-20 color-000 fl"); 
            }
       }
    });


});
</script>
<script>
    function aa(e) {
        var a = $("#pu").children('li').length;
        var b = $(e).attr('id');
        var tid = $(e).attr("value");
        var i = 0;
        for (i; i < a; i++) {
            if ("pl" + i == b) {
                if ($("#" + b).hasClass('selected') == true) {
                    $("#pu #" + b).attr("class", "border mb-20 color-000 fl");
                    $(".platforma").attr("value", "");
                } else {
                    $("#pu #" + b).attr("class", "border mb-20 color-000 fl selected");
                    $(".platforma").attr("value", tid);
                }
            } else {
                $("#pu #pl" + i).attr("class", "border mb-20 color-000 fl");
            }
        }
    }
</script>
<script>
    function sb1(){
       var tu= $("#sed .types").attr("value");
       var pu= $(".platforma").attr("value");
       var qu= $(".service").val();
        if(tu==""){
            swal("请确认是否选择交易类型！");return false;
        }
        if(pu==""){
            swal("请确认是否选择平台！");return false;
        }
        if(qu==""){
            swal("区服不能为空！");return false;
        }

        return true;
       // window.location.href="__CONTROLLER__/sell_order?g_id="+g_id+"&pt="+pt+"&t_id="+t_id;
    }
</script>

</body>
 </html>