<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;
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
        $loaiSanPham = DB::table('loaisanpham')->get();
        View::share('loaiSanPham',$loaiSanPham);
    }
}
