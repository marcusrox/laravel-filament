<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Config extends Model
{
    use HasFactory;
    use LogsActivity;

    public static function getValue($key)
    {
        $setting = static::where('key', $key)->first();
        if ($setting) {
            return $setting->attributes['value'];
        } else {
            return null;
        }
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
