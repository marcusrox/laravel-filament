<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;
    public function grupo_economico(): BelongsTo
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'end_cidade_id');
    }

    public function cidade_cobranca(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'end_cob_cidade_id');
    }
}
