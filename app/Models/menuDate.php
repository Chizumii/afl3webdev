<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class menuDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'menu_id',
    ];

    public static function getAllMenuDate()
    {
        return self::all();
    }

    // penghubung relation database
    public function menus(): BelongsTo{
        return $this->belongsTo(menu::class);
    }
    public function orderDetails(): HasMany{
        return $this->hasMany(orderDetail::class, 'menuDate_id');
    }
}