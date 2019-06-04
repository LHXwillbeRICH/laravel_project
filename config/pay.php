<?php
/**
 * Created by PhpStorm.
 * User: 李昊翾
 * Date: 2019/5/18
 * Time: 18:00
 */

return [
    'wechat' => [
        'app_id'      => 'wxcecc8afb50b845ff',
        'mch_id'      => '1489465732',
        'key'         => 'jiaoyitushouchonghao123456789dss',
        'cert_client' =>  resource_path('wechat_pay/apiclient_cert.pem'),
        'cert_key'    =>  resource_path('wechat_pay/apiclient_key.pem'),
        'notify_url'    =>'http://www.shouchonghao.com/Pay/wechatNotify',
    ],
];