<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqsModel extends Model {
    use HasFactory;

    public $table = 'tw_faqs';
    public $primarykey = 'faq_id';
    public $timestamps = false;
}