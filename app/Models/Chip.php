<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chip extends Model
{
    //mass assignment vulnerability protection
    protected $fillable = [
        'message',
    ];

    //define the relationship between chips and users   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
