<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KidsCampsPricingsModel extends Model {
    
    public $table = 'tw_kids_camps_pricings';
    public $primarykey = 'kid_camp_pricing_id';
    public $timestamps = false;
}