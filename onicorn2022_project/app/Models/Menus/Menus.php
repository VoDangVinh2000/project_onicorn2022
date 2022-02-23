<?php

namespace App\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = "la_menus";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'link_href', 'icon', 'enabled', 'created_at', 'update_at',
    ];
}