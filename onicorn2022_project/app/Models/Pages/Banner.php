<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "la_banner";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = [
        "id","page_id","title","subtitle","photo","enabled","created_at","updated_at"
    ];
}
