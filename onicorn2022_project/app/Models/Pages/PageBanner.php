<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBanner extends Model
{
    use HasFactory;
    protected $table = "la_page_banner";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = [
        "id","page_id","banner_id","enabled","created_at","updated_at"
    ];
}
