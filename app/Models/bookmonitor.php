<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmonitor extends Model
{
    use HasFactory;

    protected $table = 'bookmonitor';

    protected $fillable = [

        'date',
        'particulars',
        'status',
        'department',
        'remarks',
    ];


}
