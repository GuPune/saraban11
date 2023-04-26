<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';

    protected $fillable = [
        'id',
        'Dpmid',
        'Dpmname',
    ];

    // public function department_one(){
    //     return $this->hasOne(User::class,'Department','Dpmid');

    // }

}
