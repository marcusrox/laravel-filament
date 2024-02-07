<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ContaCorrente extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contas_correntes';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
    public function banco(): BelongsTo
    {
        return $this->belongsTo(Banco::class);
    }
}
