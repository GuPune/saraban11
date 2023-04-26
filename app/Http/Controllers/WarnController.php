<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\support\Facades\DB; 
use App\Models\agency;
use App\Models\admitagency;
use App\Models\Department;
use App\Models\User;
use App\Models\admit;
use App\Models\Bookout;
use App\Models\transport;
use Illuminate\Support\Facades\Auth;

class WarnController extends Controller
{
    public function warn()
    {
        $role=Auth::user()->role;
        // user
        if($role=='0')
        {
        $admit = admit::where('Eagency_receive','LIKE',Auth::user()->Agency)
        ->where('Ebranch_receive','LIKE',Auth::user()->Branch)
        ->where('Edepartment_receive','LIKE',Auth::user()->Department)
        ->Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->get();
        $admitcount = admit::where('Eagency_receive','LIKE',Auth::user()->Agency)->
        where('Ebranch_receive','LIKE',Auth::user()->Branch)->
        where('Edepartment_receive','LIKE',Auth::user()->Department)
        ->Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Oagency','LIKE',Auth::user()->Agency)->where('Obranch','LIKE',Auth::user()->Branch)->where('Odepartment','LIKE',Auth::user()->Department)
        ->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->orderby('date','DESC')->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Oagency','LIKE',Auth::user()->Agency)->where('Obranch','LIKE',Auth::user()->Branch)->where('Odepartment','LIKE',Auth::user()->Department)
        ->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->count();
        $transport = transport::where('trbranch','LIKE',Auth::user()->Branch)->where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('trdate','DESC')->get();
        $transportcount = transport::where('trbranch','LIKE',Auth::user()->Branch)->where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        }
        // staff admin
        else
        {
        $admit = admit::Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->orderby('Edate_out','DESC')->get();
        $admitcount = admit::Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->orderby('date','DESC')->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Oupload',null)->count();
        $transport = transport::where('trsid','1')->orderby('trdate','DESC')->get();
        $transportcount = transport::where('trsid','1')->count();
        }
        return view('warn.warn',compact('admit','bookout','transport','admitcount','bookout','bookoutcount','transport','transportcount'));
    }

}
