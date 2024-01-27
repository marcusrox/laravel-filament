<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Produto extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $casts = [
        'preco' => MoneyCast::class,
    ];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
