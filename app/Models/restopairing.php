<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class restoPairing extends Model
{
    use HasFactory;

    protected $fillable = [
        'resto_id',
        'category_id',
    ];

    public static function getAllRestoPairing()
    {
        return self::all();
    }

    // penghubung relation database
    public function resto()
    {
        return $this->belongsTo(resto::class, 'resto_id', 'id');
    }
    public function categories(): BelongsTo{
        return $this->belongsTo(category::class);
    }
}