<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    use HasFactory;
    protected $table = "la_banner";
    
    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'photo',
        'enabled',
        
    ];
     public function page()
     {
         return $this->belongsTo('App\Models\Page\Page','page_id','id');
     }
}
