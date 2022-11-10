<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodParty extends Model
{
    use HasFactory;
//id	start	end	date	food_id	created_at	updated_at

    protected $fillable = [ 'start'	,'end','date','food_id','present'];

}
