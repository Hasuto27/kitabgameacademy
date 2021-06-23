<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
        protected $fillable = [
        'user_id',
        'programme_id',
        'programme_name',
        'programme_price',
        'link_gambar',
    ];
}
