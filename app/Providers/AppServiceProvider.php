<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway; 
use App\Billing\CreditPaymentGateway; 
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Channel;
use App\Http\View\Composers\ChannelsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton( PaymentGatewayContract::class, function ($app) {

            if(request()->has('credit'))
            {
                return new CreditPaymentGateway('rupiah');
            }
            return new BankPaymentGateway('rupiah');
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // view::share('channels', Channel::orderBy('name', 'desc')->get());

        // bintang artinya semua file yang ada difolder channel

        // view::composer(['channel.*', 'post.create'], function ($view) {
        //     $view->with('channels', Channel::orderBy('name', 'desc')->get());
        // });

        // bikin class di App\Http\Views\Composers\ChannelsComposer.php bikin method compose(View $view)
        // isinya $view->with('channels', Channel::orderBy('name', 'desc')->get());
        // terus bikin view::composer bisa bikin providers baru syaratnya narus nambahin serviceprovidernya ke config/app.php
        // bisa pakai AppServiceProvider.php di method boot() kek dibawah ini..

        // view::composer(['partials.channels.*'], ChannelsComposer::class);
    
        }
}
