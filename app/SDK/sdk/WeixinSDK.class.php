<?php
/**
 * Class WeixinSDK 调用微信接口
 * @author 高明阳<gaomingyang@51talk.com>
 * @time 2018-08-19 22:47
 * 官方文档:https://open.weixin.qq.com/cgi-bin/showdocument?action=dir_list&t=resource/res_list&verify=1&id=open1419316505&token=37fb6f7e05e48003234eb28243bc255f535a88ee&lang=zh_CN
 */
use Org\ThinkSDK\ThinkOauth;
class WeixinSDK extends ThinkOauth{

    /**
     * 获取requestCode的api接口 后接?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect。scope 为snsapi_login
     * @var string
     */
    protected $GetRequestCodeURL = 'https://open.weixin.qq.com/connect/qrconnect';

    protected $GetOffRequestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';
    /**
     * 获取token   后接?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
     * @var string
     */
    protected $GetAccessTokenURL = 'https://api.weixin.qq.com/sns/oauth2/access_token';

    /**
     * 获取request_code的额外参数,可在配置中修改 URL查询字符串格式
     * @var srting
     */
    protected $Authorize = 'scope=snsapi_login';

    protected $Authorize_off = 'scope=snsapi_userinfo';

    public $openid=null;

    /**
     * API根路径
     * @var string
     */
    protected $ApiBase = 'https://api.weixin.qq.com/';

    CONST STR = WEIXIN;    //微信配置字符串


    /**
     * 获取code
     */
    public function getRequestCodeURL(){
        $url = $this->GetRequestCodeURL;
        $config = C($this->is_off.self::STR);
        $eparams = $this->Authorize;
        if($this->isOffic()){
            $url = $this->GetOffRequestCodeURL;
            $eparams = $this->Authorize_off;
        };
        // $this->Callback = $config['CALLBACK'];
        $callbackurl = strval($config['CALLBACK']);
        $params = array(
            'appid'     => $this->AppKey,
            // 'redirect_uri'  => $this->Callback,
            'redirect_uri'  => $callbackurl,
            'response_type' => $this->ResponseType,

        );
        // &state=STATE#wechat_redirect
        //获取额外参数
        if($eparams){
            parse_str($eparams, $_param);
            if(is_array($_param)){
                $params = array_merge($params, $_param);
            } else {
                throw new \Exception('AUTHORIZE配置不正确！');
            }
        }
        return  $url . '?' . http_build_query($params).'&state=STATE#wechat_redirect';
    }

    /**
     * 获取access_token
     * @param string $code 上一步请求到的code
     * @return array|null
     * @throws \Exception
     */
    public function getAccessToken($code, $extend = null){
        $params = array(
            'appid'     => $this->AppKey,
            'secret' => $this->AppSecret,
            'grant_type'    => $this->GrantType,
            'code'          => $code,
        );

        $data = $this->http($this->GetAccessTokenURL, $params, 'GET');
        $this->parseToken($data, $extend);
        return $this->Token;
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
            'openid'             => $this->openid,
        );
        if($this->isOffic()){
            $params['lang'] = 'zh_CN';
        };
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
     * 获取当前授权用户的SNS标识
     */
    public function openid()
    {
        // TODO: Implement openid() method.
    }
}