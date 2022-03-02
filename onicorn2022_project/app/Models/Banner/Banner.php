<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "la_banner";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id', 'title','page_id' ,'subtitle','photo' ,'enabled', 'created_at', 'updated_at',
    ];
}