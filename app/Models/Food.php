<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [  	'name',	'materials'	,'price'	,'image_path',	'cat_id',	'restaurant_id'];

    public function category()
    {
        return $this->belongsToMany(FoodCategory::class);
    }

    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
    public function foodparty()
    {
        return $this->hasMany(FoodParty::class);
    }

    public static function restaurant($id)
    {
        $restaurant=Food::find($id)['restaurant_id'];
      return $restaurant;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
