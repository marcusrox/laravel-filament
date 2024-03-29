<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ContaPagar extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contas_pagar';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
    public function conta_corrente(): BelongsTo
    {
        return $this->belongsTo(ContaCorrente::class);
    }

    public function centro_custo(): BelongsTo
    {
        return $this->belongsTo(CentroCusto::class);
    }
}
