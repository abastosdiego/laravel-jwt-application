<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoProduto extends Model
{
    use HasFactory;
    protected $table = 'tipo_produtos';
    protected $fillable = ['descricao', 'id_imagem'];

    /**
     * Define a relação de Tipo de Produto com Produto
     *
     * @return HasMany
     */
    public function produtos() : HasMany {
        return $this->hasMany(Produto::class);
    }

    /**
     * Obter a imagem relacionada ao Tipo de Produto
     */
    public function imagem(): BelongsTo
    {
        return $this->belongsTo(Imagem::class, 'id_imagem');
    }

    public function toArray()
    {
        $this->load('imagem');
        return parent::toArray();
    }
}
