<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => MoneyCast::class,
    ];
 
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
