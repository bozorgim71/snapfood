<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['name',	'description'	, 'present' ,	'food_id'	];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public static  function userDiscount($id)
    {
        $user=User::find($id);
      //$rest =   $user->restaurant()->get();
        $food=$user->food()->get();
         $name=[];
        foreach ($food as $f) {
            $name[]=$f['id'];
        }

        $discout=[];

        foreach (Discount::all() as $dis )
        {
            if(in_array($dis['food_id'],$name)){
                $discout[]=$dis;
            }
        }
        return $discout;


    }
}
