<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class users extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'address',
        'number',
        'password',
    ];

     // penghubung relation database
    public function orderUsers(): HasMany{
        return $this->hasMany(orderUser::class, 'users_id');
    }
}