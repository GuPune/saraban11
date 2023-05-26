<?php

namespace App\CoreFunction;

use App\Models\Bookout;
use App\Models\branch;
use App\Models\Depart;
use Illuminate\Database\Eloquent\Model;


class Helper extends Model
{
    public static  function Fun ($id) {
        // return Department Name ตาม Dpmid จาก Database 
        $data = $id;
        $getmo = Depart::where('Dpmid',$data)->first();


        return $getmo->Dpmname;
    }
    public static  function Bran ($id) {
        // return Branche Name and Brance Address จาก brance id

        $data = $id;
        $getmo = branch::where('branche_id',$data)->first();
        $bName = $getmo->branche_name;
        $bAddr = $getmo->branche_addr;

        return compact('bName','bAddr');
    }

}
