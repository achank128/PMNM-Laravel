<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    use HasFactory;

    protected $table = 'bomons';

    protected $fillable = [
        'mabomon',
        'tenbomon',
        'mota',
        'vanphong'
    ];
}