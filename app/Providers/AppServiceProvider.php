<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Yansongda\Pay\Pay;
use App\Models\Store;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share("title",config('app.title'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('wechat_pay', function () {
            $config = config('pay.wechat');
            // 调用 Yansongda\Pay 来创建一个微信支付对象
            return Pay::wechat($config);
        });

        $this->app->singleton('Store',function(){
            return new Store();
        });
    }
}
