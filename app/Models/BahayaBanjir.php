<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BahayaBanjir extends Model
{
    use HasFactory;

    protected $table = 'bahaya_banjir';

    protected $fillable = [
        'tanaman_id',
        'values',
        'bobot',
    ];
}
