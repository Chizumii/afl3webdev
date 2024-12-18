<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class deliveryStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_name'
    ];

    public static function getAllDeliveryStatus()
    {
        return self::all();
    }

    // penghubung relation database
    public function orderDetails(): HasMany{
        return $this->hasMany(orderDetail::class, 'delivery_status_id');
    }
}