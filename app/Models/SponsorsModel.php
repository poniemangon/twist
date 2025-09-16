<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorsModel extends Model {
    use HasFactory;

    public $table = 'tw_sponsors';
    public $primaryKey = 'sponsor_id';
    public $timestamps = false;
}