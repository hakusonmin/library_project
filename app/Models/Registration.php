<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sheet_id',
    ];

    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }
}
