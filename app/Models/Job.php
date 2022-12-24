<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table='jobs';
     
    protected $fillable = [
        'id',
        'id_user',
        'id_food',
        'id_vacxin',
        'name',
        'note',
        'status',
    ];
}
