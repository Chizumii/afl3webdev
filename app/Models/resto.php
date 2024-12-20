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
    public function menus()
{
    return $this->hasMany(Menu::class, 'resto_id');
}
    public function restoPairings(): HasMany{
        return $this->hasMany(restoPairing::class, 'resto_id');
    }
    public function resto()
{
    return $this->belongsTo(resto::class, 'resto_id');
    
}


}