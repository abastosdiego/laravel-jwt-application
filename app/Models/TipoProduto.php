<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoProduto extends Model
{
    use HasFactory;
    protected $table = 'tipo_produtos';
    protected $fillable = ['descricao'];

    /**
     * Define a relação de Tipo de Produto com Produto
     *
     * @return HasMany
     */
    public function produtos() : HasMany {
        return $this->hasMany(Produto::class);
    }
}
