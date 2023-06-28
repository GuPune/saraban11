<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    protected $table = 'manager';

    protected $fillable = [
        'emID',
        'prefix',
        'fname',
        'lname',
        'position',
    ];
}
