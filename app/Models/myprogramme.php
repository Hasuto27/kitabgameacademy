<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myprogramme extends Model
{
    use HasFactory;
            protected $fillable = [
        'user_id',
        'programme_id',
        'programme_name',
        'link_gambar',
    ];
}
