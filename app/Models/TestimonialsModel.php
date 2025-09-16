<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model {
    use HasFactory;

    public $table = 'tw_testimonials';
    public $primarykey = 'testimonials_id';
    public $timestamps = false;
}