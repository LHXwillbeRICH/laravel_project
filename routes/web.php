<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain'=>'www.shouchonghao.com'],function(){
    Route::get('/','Index\IndexController@index');
    Route::match(['get','post'],'/Index/gameSearch','Index\IndexController@gameSearch');

    Route::get('Buy/store_list/{id}/{type?}/{plat?}/{qufu?}/{sort?}','Index\BuyController@store_list');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/store/index/{type?}','Index\StoreController@index');  //我要卖
        Route::get('/store/sell_step_one/{id}','Index\StoreController@SellStepOne'); //填写商品信息
        Route::post('/store/sell_step_two','Index\StoreController@SellStepTwo');  //添新游戏相关信息
        Route::post('/store/sell_step_add','Index\StoreController@SellStepAdd');  //添加商品
        Route::get('/store/ajax/{id}/{type}','Index\StoreController@ajax');
        Route::get('/store/changeStoreStatus/{id}/{status}','Index\StoreController@changeStoreStatus');

        //我要买分组
        Route::group(['prefix'=>'Buy'],function(){

            Route::get('/index/{type?}','Index\BuyController@index');
            Route::get('/detail/{id}','Index\BuyController@detail');
            Route::get('/order/{id}','Index\BuyController@order');
        });

        Route::group(['prefix'=>'Personal'],function(){
            Route::get('/index','Index\PersonalController@index');   //个人中心首页
            Route::get('/store_list/{type?}','Index\PersonalController@storeList');     //商品列表
            Route::get('/detail/{id}','Index\PersonalController@detail');   //商品详情
            Route::get('/order/{id}','Index\PersonalController@order'); //订单
            Route::get('/data','Index\PersonalController@data');        //个人信息
            Route::post('/dataEdit','Index\PersonalController@dataEdit');    //修改个人信息
            Route::get('/tixian','Index\PersonalController@tixian');
            Route::get('/withdraw/{money?}','Index\PersonalController@withdraw');
            Route::get('/sms_code','Index\PersonalController@smsCode');
            Route::get('/change_phone_reset','Index\PersonalController@changePhoneReset');
        });

        //个人中心中的订单列表
        Route::group(['prefix'=>'Order'],function(){
            Route::get('list/{status}','Index\OrderController@list');
            Route::get('changeOrderStatus/{status}/{id}/{del?}','Index\OrderController@changeOrderStatus');
        });


        Route::get('/logout','Index\LoginController@logout');
        Route::match(['get','post'],'/Pay/index/{id}/{orderid?}','Index\PayController@index'); //调用微信支付
    });


    Route::post('/Pay/wechatNotify','Index\PayController@wechatNotify');

    Route::get('/login','Index\LoginController@index');
    Route::get('/login/remind','Index\LoginController@remind')->name('remind');

    Route::get('/callback','Index\LoginController@callback');  //微信登陆的回调地址
});

