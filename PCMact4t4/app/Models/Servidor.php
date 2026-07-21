<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostname',
        'ip_address',
        'so',
        'data_center',
        'estado',
    ];
}
