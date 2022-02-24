<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'la_pages';
   
    public function banner(){
        return $this->hasMany('App\Models\Banner\Banner');
    }

    public function head(){
        return $this->hasMany('App\Models\Head\Head');
    }
}
