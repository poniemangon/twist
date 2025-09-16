<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyOptionPricesModel extends Model {
    use HasFactory;

    public $table = 'tw_party_option_prices';
    public $primarykey = 'party_option_price_id';
    public $timestamps = false;
}