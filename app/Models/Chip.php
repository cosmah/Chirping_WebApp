<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chip extends Model
{
    //mass assignment vulnerability protection
    protected $fillable = [
        'message',
    ];
}
