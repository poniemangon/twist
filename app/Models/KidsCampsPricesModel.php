<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KidsCampsPricesModel extends Model {
    
    public $table = 'tw_kids_camps_prices_list';
    public $primarykey = 'kid_camp_price_list_id';
    public $timestamps = false;
}