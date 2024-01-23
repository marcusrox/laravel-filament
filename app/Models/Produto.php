<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    use HasFactory;

    protected $casts = [
        'preco' => MoneyCast::class,
    ];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }

}
