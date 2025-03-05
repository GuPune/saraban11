<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'user_id',
        'fdepartment',
        'dnumber',
        'cnumber',
        'year',
        'date',
        'story',   //เพิ่มเข้ามา
        'learn',   //เพิ่มเข้ามา
        'quote',   //เพิ่มเข้ามา
        'enclosure',   //เพิ่มเข้ามา
        'details',  //เพิ่มเข้ามา
        'sName',
        'sign',
        'sPosition',
        'type',
        'formagency',
        'formbranch',
        'formdepartment',
        'copy_to',
        'regard',
    ];

}
