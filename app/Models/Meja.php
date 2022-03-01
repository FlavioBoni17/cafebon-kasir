<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = "meja";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nomor_meja'
    ];
}
