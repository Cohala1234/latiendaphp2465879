<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Relacionar producto con marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}