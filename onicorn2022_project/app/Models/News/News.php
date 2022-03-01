<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "la_news";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id', 'title', 'photo_sub', 'author_name', 'content', 'enabled', 'featured', 'deleted', 'created_at', 'update_at',
    ];
}