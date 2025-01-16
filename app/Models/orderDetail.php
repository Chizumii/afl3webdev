<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class orderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'unit',
        'name',
        'delivery_status_id',
        'order_user_id',
    ];

    public static function getAllOrderDetail()
    {
        return self::all();
    }

    // penghubung relation database
    public function menuDates()
    {
        return $this->belongsTo(MenuDate::class, 'menu_date_id');
    }


    public function deliveryStatuses(): BelongsTo
    {
        return $this->belongsTo(deliveryStatus::class, 'delivery_status_id');
    }

    // Relasi ke OrderUser
    public function orderUser(): BelongsTo
    {
        return $this->belongsTo(OrderUser::class, 'order_user_id');
    }
    
}
