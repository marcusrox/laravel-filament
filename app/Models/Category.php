<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }


    // public static function boot()
    // {
    //     parent::boot();
    //     self::created(function ($model) {
    //         $this->attributes['slug'] = Str::slug($this->name);
    //     });
    //     self::updated(function ($model) {
    //         $this->attributes['slug'] = Str::slug($this->name);
    //     });
    //     self::deleted(function ($model) {
            
    //     });
    // }

}
