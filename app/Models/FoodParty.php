<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodParty extends Model
{
    use HasFactory;
//id	start	end	date	food_id	created_at	updated_at

    protected $fillable = [ 'start'	,'end','date','food_id','present'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }


    public static  function userParty($id)
    {
        $user=User::find($id);
        //$rest =   $user->restaurant()->get();
        $food=$user->food()->get();
        $name=[];
        foreach ($food as $f) {
            $name[]=$f['id'];
        }

        $party=[];

        foreach (FoodParty::all() as $dis )
        {
            if(in_array($dis['food_id'],$name)){
                $party[]=$dis;
            }
        }
        return $party;


    }
}
