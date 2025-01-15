<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class orderUser extends Model
{
    use HasFactory;


    protected $table = 'order_users';
    protected $fillable = [
        'user_id',
        'totalPrice',
        'date',
        'isPaymentStatus',
    ];

    public static function getAllOrderUser()
    {
        return self::all();
    }


    // penghubung relation database
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function orderDetails(): HasMany
    {
        return $this->hasMany(orderDetail::class, 'orderUser_id');
    }
    
}
