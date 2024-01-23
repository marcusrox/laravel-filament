<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use HasFactory;

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Str::slug($model->nome);
        });
        self::updating(function ($model) {
            $model->slug = Str::slug($model->nome);
        });
        self::deleting(function ($model) {

        });
    }

}
