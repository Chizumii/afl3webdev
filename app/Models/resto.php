<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class resto extends Model
{
    use HasFactory;
    protected $fillable = [
        'resto_name',
        'address',
        'number',
    ];

    public static function getAllResto()
    {
        return self::all();
    }

    // penghubung relation database
    public function menus(): HasMany{
        return $this->hasMany(menu::class, 'resto_id', 'id');
    }
    public function restoPairings(): HasMany{
        return $this->hasMany(restoPairing::class, 'resto_id');
    }
}