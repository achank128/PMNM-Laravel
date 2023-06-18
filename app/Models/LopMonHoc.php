<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopMonHoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'malop',
        'tenlop',
        'mota',
        'soluongsv',
    ];
}
