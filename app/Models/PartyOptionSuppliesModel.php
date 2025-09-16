<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyOptionSuppliesModel extends Model {
    use HasFactory;

    public $table = 'tw_party_option_supplies';
    public $primarykey = 'party_option_supply_id';
    public $timestamps = false;
}