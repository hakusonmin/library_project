<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    /** @use HasFactory<\Database\Factories\HallFactory> */
    use HasFactory;

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
}
