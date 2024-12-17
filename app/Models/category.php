<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryName'
    ];

    public static function getAllCategory()
    {
        return self::all();
    }

    // penghubung relation database
    public function restoPairings(): HasMany{
        return $this->hasMany(restoPairing::class, 'category_id');
    }
}