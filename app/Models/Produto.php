<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    /**
     * Define a relação entre Produto e Tipo de Produto
     */
    public function tipo_produto() {
        return $this->belongsTo(Tipo_Produto::class);
    }
}
