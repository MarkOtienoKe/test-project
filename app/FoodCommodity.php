<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCommodity extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_food_crops_prices';
    protected $primaryKey = 'id';
}
