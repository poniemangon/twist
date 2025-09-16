<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewslettersModel extends Model {
    use HasFactory;

    public $table = 'tw_newsletters';
    public $primaryKey = 'newsletter_id';
    public $timestamps = false;
}