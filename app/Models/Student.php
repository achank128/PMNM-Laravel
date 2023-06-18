<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'MSSV',
        'HoTen',
        'GioiTinh',
        'NgaySinh',
        'DiaChi',
        'SDT',
        'MaLop'
    ];

    public $sortable = [
        'MSSV',
        'HoTen',
        'GioiTinh',
        'NgaySinh',
        'DiaChi',
        'SDT',
        'MaLop'
    ];
}