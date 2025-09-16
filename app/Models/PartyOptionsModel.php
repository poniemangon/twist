<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyOptionsModel extends Model {
    use HasFactory;

    public $table = 'tw_party_options';
    public $primarykey = 'party_option_id';
    public $timestamps = false;
}