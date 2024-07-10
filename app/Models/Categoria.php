<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Categoria extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'categorias';

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->validate();
        });

        self::creating(function ($model) {
            $model->slug = Str::slug($model->nome);
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->nome);
        });

        self::deleting(function ($model) {
        });
    }

    public function validate()
    {
        // Defina suas regras de validação
        $validator = Validator::make($this->attributes, [
            //'nome' => 'required|string|max:255|unique:categoria',
            // Outras regras de validação
        ]);

        if ($validator->fails()) {
            //dd($validator);
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
