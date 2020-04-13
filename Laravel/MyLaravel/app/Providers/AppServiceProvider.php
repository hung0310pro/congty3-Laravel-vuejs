<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('title_allview','Học lập trình laravel'); // chỉ cần echo cái biến $title_allview thì
// ở trang view nào thì sẽ lấy đc giá trị của nó.
// 
// nếu chỉ muốn share biến cho 1 vài trang cần truyền thì làm như sau
        View::composer('myview',function($view){
          return $view->with('bien1',"Đây là biến 1");
        });

// nếu truyền sang nhiều view thì làm như sau, cho mấy cái view vào trong 1 mảng
        View::composer(['myview','b23'],function($view){
          return $view->with('bien1',"Đây là biến 1");
        });
    }
}
