<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesModel extends Model {
    use HasFactory;

    public $table = 'tw_articles';
    public $primaryKey = 'article_id';
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'excerpt', 
        'body',
        'meta_title',
        'meta_description',
        'url_slug',
        'image',
        'publish_date',
        'paused'
    ];
    public function articleFaqs() {
        return $this->hasMany(ArticleFaqsModel::class, 'article_id', 'article_id');
    }
}