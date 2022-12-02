<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // id	status	code	foods	user_id	restaurant_id	created_at	updated_at

    protected $fillable = ['status', 'cost', 'code', 'foods_id', 'foods_count', 'foods_name', 'user_id', 'restaurant_id'];


        public function comment()
    {
        return $this->hasMany(Comment::class);
    }


}
