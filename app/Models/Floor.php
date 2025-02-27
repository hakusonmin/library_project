<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    /** @use HasFactory<\Database\Factories\FloorFactory> */
    use HasFactory;

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
