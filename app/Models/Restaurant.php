<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone','account','image_path','user_id','cat_id','longitude','latitude','description'];


    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function category()
    {
        return $this->belongsToMany(RestaurantCategory::class);
    }


}
