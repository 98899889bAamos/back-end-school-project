<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student2 extends Model
{
    use HasFactory;

    protected $table = 'students_table2';
    protected $fillable = [
        's_name',
        'class',
        'p_name',
        'number',
    ];
}
