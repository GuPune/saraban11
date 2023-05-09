<?php

namespace App\CoreFunction;

use App\Models\Depart;
use Illuminate\Database\Eloquent\Model;


class Helper extends Model
{
    public static  function Fun ($id) {


        $data = $id;
        $getmo = Depart::where('Dpmid',$data)->first();


        return $getmo->Dpmname;
    }








}
