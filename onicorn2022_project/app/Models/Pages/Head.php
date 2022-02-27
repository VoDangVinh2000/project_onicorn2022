<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;
    protected $table = "la_head";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = [
        "id","title","content","enabled","created_at","updated_at"
    ];
}
