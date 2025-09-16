<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingBenefitsModel extends Model {
    use HasFactory;

    public $table = 'tw_pricing_benefits';
    public $primarykey = 'pricing_benefit_id';
    public $timestamps = false;
}