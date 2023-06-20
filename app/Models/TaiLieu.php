<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieu extends Model
{
    use HasFactory;

    protected $table = 'tailieus';

    protected $fillable = [
        'matailieu',
        'tentailieu',
        'tomtat',
        'madanhmuc',
    ];
}