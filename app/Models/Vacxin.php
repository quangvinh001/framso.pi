<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacxin extends Model
{
    use HasFactory;
    protected $table='vacxins';
     
    protected $fillable = [
        'id',
        'id_pet',
        'name',
        'price',
        'num',
        'image',
        'note'
    ];
}
