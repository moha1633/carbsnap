<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
    'name_en','name_local','category','region','serving_label','carbs_per_serving'
];

}
