<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'status', 'score', 'user_id', 'order_id','restaurant_id','answer'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
