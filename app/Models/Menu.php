<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'menuName',
        'description',
        'price',
        'image',
        'resto_id'
    ];

    public static function getAllMenu()
    {
        return self::all();
    }

    // penghubung relation database
    public function restos(): BelongsTo{
        return $this->belongsTo(resto::class, 'resto_id', 'id');
    }
    public function menuDates(): HasMany
    {
        return $this->hasMany(MenuDate::class, 'menu_id', 'id');
    }
}