<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inputData extends Model
{
    use HasFactory;

    protected $fillable = [
        'suhu',
        'kelembapan',
        'kedalaman_tanah',
        'keasaman',
        'drainase',
        'lereng',
        'tekstur',
        'banjir_dalam',
        'banjir_lama',
    ];
}
