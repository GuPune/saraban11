<?php

namespace App\CoreFunction;

use App\Models\Bookout;
use App\Models\branch;
use App\Models\Depart;
use Illuminate\Database\Eloquent\Model;


class Helper extends Model
{
    public static  function Fun ($id) {


        $data = $id;
        $getmo = Depart::where('Dpmid',$data)->first();


        return $getmo->Dpmname;
    }
    public static  function Bran ($id) {


        $data = $id;
        $getmo = branch::where('branche_id',$data)->first();
        $bName = $getmo->branche_name;
        $bAddr = $getmo->branche_addr;

        return compact('bName','bAddr');
    }
    public static  function bWriterId ($id) {
        $data = $id;
        $getmo = Bookout::where('id',$data)->first();
        return $getmo->Obranch;
    }
}
