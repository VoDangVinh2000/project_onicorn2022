<?php

namespace App\Models\Head;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;
    protected $table = "la_head";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id','page_id' ,'title', 'content', 'enabled', 'created_at', 'update_at',
    ];
}