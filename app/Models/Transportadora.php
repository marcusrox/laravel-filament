<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Transportadora extends Model
{
    use HasFactory;
    use LogsActivity;

    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class, 'end_uf_id');
    }

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'end_cidade_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
