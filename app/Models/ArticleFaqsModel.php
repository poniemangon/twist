<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleFaqsModel extends Model {
    use HasFactory;

    public $table = 'tw_article_faqs';
    public $primaryKey = 'article_faq_id';
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'description',
        'article_id'
    ];
}