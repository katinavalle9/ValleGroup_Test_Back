<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Declaramos que propiedades podemos llenar en base de datos
    protected $fillable = ['name', 'description', 'price'];
}
