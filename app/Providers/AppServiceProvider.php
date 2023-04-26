<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\permissions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\admit;
use App\Models\Bookout;
use App\Models\transport;
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
        //
        Paginator::useBootstrap();
        $setallow =permissions::all();
        $admitcount = admit::Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->count();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->count();
        $transportcount = transport::where('trsid','1')->count();
        $total = $admitcount+$bookoutcount+$transportcount;
        view()->share('setallow', $setallow );
        view()->share('total', $total );
        // if (Auth::check())
        // {
        // }   
        view()->composer('layouts.user.sidebar', function ($view) 
        {
        $admitusercount = admit::where('Eagency_receive','LIKE',Auth::user()->Agency)
        ->where('Ebranch_receive','LIKE',Auth::user()->Branch)
        ->where('Edepartment_receive','LIKE',Auth::user()->Department)
            ->Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->count();
            $bookoutusercount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')
            ->where('Obranch','LIKE',Auth::user()->Branch)->where('Odepartment','LIKE',Auth::user()->Department)->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->count();
            $transportusercount = transport::where('trbranch','LIKE',Auth::user()->Branch)->where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
            $totaluser = $admitusercount+$bookoutusercount+$transportusercount;
            $view->with('totaluser', $totaluser );    
    });  
           
                    
    }
}