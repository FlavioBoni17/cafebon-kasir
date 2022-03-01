<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_menu','harga','foto'
    ];
}
