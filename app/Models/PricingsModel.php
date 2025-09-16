<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingsModel extends Model {
    use HasFactory;

    public $table = 'tw_pricings';
    public $primarykey = 'pricing_id';
    public $timestamps = false;
}
