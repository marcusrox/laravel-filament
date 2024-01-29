<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cliente extends Model
{
    use HasFactory;
    use LogsActivity;

    public function grupo_economico(): BelongsTo
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }

    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class, 'end_uf_id');
    }

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'end_cidade_id');
    }

    public function uf_cobranca(): BelongsTo
    {
        return $this->belongsTo(Uf::class, 'end_cob_uf_id');
    }

    public function cidade_cobranca(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'end_cob_cidade_id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            /** @var \App\Models\User */
            $user = auth()->user();
            if ($user) {
                // Se usuário criando cliente for um vendedor, setar o vendedor_id
                $model->vendedor_id = $user->vendedor()->first()->id;
            }
        });
        self::updating(function ($model) {
            //
        });
        self::deleting(function ($model) {
            //
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
