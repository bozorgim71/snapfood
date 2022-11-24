<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected  $fillable = ['name' , 'description'];

    public function food()
    {
        return $this->belongsToMany(Food::class);
    }
}
