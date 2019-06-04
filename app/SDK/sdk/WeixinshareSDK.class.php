<?php
namespace App\SDK\sdk;
/**
 * Created by PhpStorm.
 * User: 李昊翾
 * Date: 2019/4/3
 * Time: 14:51
 */
use App\SDK\ThinkOauth;
class WeixinShareSDK extends ThinkOauth{

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
    public function getAccessToken($extend = null){
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
        $data = json_decode(file_get_contents("jsapi_ticket.json"));
        if ($data->expire_time < time()) {
        $params = array(
            'access_token'      =>$this->Token['access_token'],
            'type'              =>$this->type,
        );
        $data = $this->http($this->getJsapiUrl,$params,'GET');
        $ticket = $this->parseJsapiTicket($data);
        if ($ticket) {
            $data->expire_time = time() + 7000;
            $data->jsapi_ticket = $ticket;
            $fp = fopen("jsapi_ticket.json", "w");
            fwrite($fp, json_encode($data));
            fclose($fp);
        }} else {
            $ticket = $data->jsapi_ticket;
        }
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
            $this->openid = $data['openid'];
            return $data;
        } else{
            throw new \Exception("获取Weixin ACCESS_TOKEN 出错：{$result}");
        }

    }
    /**
     * 抽象方法，在SNSSDK中实现
     * 解析access_token方法请求后的返回值
     */
    protected function parseJsapiTicket($result, $extend)
    {

        $data = json_decode($result,true);
        if($data['ticket'] && $data['expires_in']){
            $this->ticket   = $data['ticket'];
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