<?php

namespace App\Http\Controllers\WX;

use App\Http\Controllers\WxBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ShareController extends WxBaseController
{
    //
    public $GetRequestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';

    public $GetAccessTokenURL = 'https://api.weixin.qq.com/cgi-bin/token'; //获取普通的access_token 而不是网页授权token

    public $getJsapiUrl = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket';

    public $Authorize = 'scope=snsapi_userinfo';

    public $lang =  'zh_CN';  //语言 中文

    public $type = 'jsapi';    //获取jsapi的类型

    public $ticket;     //jsapi_ticket

    public $time;    //获取签名的时间戳

    public $nonceStr = "www.shouchonghao.com";

    protected $GrantType = 'client_credential';    //这个和支付不一样，这里是必须填这个

    public $Token;

    public $AppKey;

    CONST EXPIRE = 7200;
    /**
     * API根路径
     * @var string
     */
    protected $ApiBase = 'https://api.weixin.qq.com/';
    /**
     * 获取access_token
     * @param string $code 上一步请求到的code
     * @return array|null
     * @throws \Exception
     */
    public function getAccessToken($code,$extend = null){
        //缓存命中直接返回token
        if(Redis::exists('share_token')){
            return $this->Token = json_decode(Redis::get('share_token'),true);
        }
        $params = array(
            'appid'     => $this->AppKey,
            'secret' => $this->AppSecret,
            'grant_type'    => $this->GrantType,
        );

        $data = $this->http($this->GetAccessTokenURL, $params, 'GET');
        $this->parseToken($data, $extend);
        return $this->Token;
    }

    /**
     *获取jsapi_ticket
     */
    public function getJsapiTicket(){
        if(Redis::exists('share_jsapi_ticket')){
            $this->ticket = Redis::get('share_jsapi_ticket');
            return true;
        }
        $params = array(
            'access_token'      =>$this->Token['access_token'],
            'type'              =>$this->type,
        );
        $data = $this->http($this->getJsapiUrl,$params,'GET');
        $this->parseJsapiTicket($data);
        return $data;
    }
    /**
     * 抽象方法，在SNSSDK中实现
     * 组装接口调用参数 并调用接口
     */
    public function call($api, $param = '', $method = 'GET', $multi = false)
    {
        /* 微信调用公共参数 */
        $params = array(
            'access_token'       => $this->Token['access_token'],
            'type'               => $this->type,
        );
        $data = $this->http($this->url($api), $this->param($params, $param), $method);
        return json_decode($data, true);
    }

    /**
     * 抽象方法，在SNSSDK中实现
     * 解析access_token方法请求后的返回值
     */
    protected function parseToken($result, $extend)
    {
        $data = json_decode($result,true);
        if($data['access_token'] && $data['expires_in']){
            $this->Token   = $data;
            //将token写入缓存
            Redis::set('share_token',json_encode($data));
            Redis::expire('share_token',self::EXPIRE);
            return $data;
        } else{
            throw new \Exception("获取Weixin ACCESS_TOKEN 出错：{$result}");
        }

    }
    /**
     * 抽象方法，在SNSSDK中实现
     * 解析access_token方法请求后的返回值
     */
    protected function parseJsapiTicket($result)
    {

        $data = json_decode($result,true);
        if($data['ticket'] && $data['expires_in']){
            $this->ticket   = $data['ticket'];
            Redis::set('share_jsapi_ticket',$data['ticket']);
            Redis::expire('share_jsapi_ticket',self::EXPIRE);
            return $data;
        } else{
            throw new \Exception("获取Weixin JSAPI_TICKET 出错：{$result}");
        }

    }

    /**
     * 获取签名
     */
    public function getSign(){
        $time=time();
        $this->time = $time;
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $string = "jsapi_ticket=$this->ticket&noncestr=$this->nonceStr&timestamp=$time&url=$url";
        return sha1($string);
    }

    /**
     * 抽象方法，在SNSSDK中实现
     * 获取当前授权用户的SNS标识
     */
    public function openid()
    {
        // TODO: Implement openid() method.
    }
}
