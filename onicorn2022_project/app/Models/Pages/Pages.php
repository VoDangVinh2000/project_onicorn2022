<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = "la_pages";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = [
        "id","name","url_code","enabled","created_at","updated_at"
    ];
}
