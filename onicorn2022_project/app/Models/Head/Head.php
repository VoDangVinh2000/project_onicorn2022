<?php

namespace App\Models\Head;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;
    protected $table = "la_head";

    public function page()
    {
        return $this->belongsTo('App\Models\Page\Page','page_id','id');
    }
}
