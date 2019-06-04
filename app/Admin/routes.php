<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'domain'        => config('admin.route.domain'),
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('plat','PlatController');
    $router->resource('equipment','EquipmentController');
    $router->resource('game','GameController');
    $router->match(['get','post'],'/game/allocation/{id}/{game_name?}','GameController@allocation');   //游戏分配设备和平台操作
    $router->post('/game/edit_allocations','GameController@editAllocation');   //游戏分配设备和平台操作
    $router->resource('banner','BannerController');
    $router->resource('/store/trade','StoreTradeController');   //商品设备管理
    $router->resource('/store/list','StoreController');         //商品管理
    $router->resource('/order','OrderController');    //订单管理
    $router->resource('/user','UserController');        //用户管理
});
