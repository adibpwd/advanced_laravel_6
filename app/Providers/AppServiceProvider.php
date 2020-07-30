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
use App\Cloudinary\CloudinaryInterface;
use App\Cloudinary\PostGateway;
use App\PostcardSendingService;
use App\newsAPI\NewsApiService;
use Illuminate\Support\Str;
use Response;
use App\Mixins\StrMixins;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // $this->app->bind( CloudinaryInterface::class, function($app) {
        //     return new PostGateway();
        // });
        
        $this->app->singleton( PaymentGatewayContract::class, function ($app) {

            if(request()->has('credit'))
            {
                return new CreditPaymentGateway('rupiah');
            }
            return new BankPaymentGateway('rupiah');
        });
        
        $this->app->singleton( CloudinaryInterface::class, function ($app) {

            return new PostGateway();
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
    
        $this->app->singleton('Postcard', function($app) {
            return new PostcardSendingService('indonesia', 5, 10);
        });

        $this->app->singleton('Newsapi', function($app) {
            return new NewsApiService();
        });

        // mirip yang kayak difile nanti fungsionalitas yang dipakai params pertama di macro contoh dibawah adalah partnumber dan ketika komponen str dipanggil
        // dengan fungsi partnumber akan menjalankan function diparams 2 macro dibawah...
        // Str::macro('partnumber', function($part) {
        //     return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        // });

        Str::mixin( new StrMixins());

        Response::macro('errorJson', function($message = 'Default error message') {
            return [
                'message' => $message,
                'error_code' => 123,
            ];
        });
    }
}
