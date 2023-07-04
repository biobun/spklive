<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Tanaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function kecocokans(): HasMany
    {
        # code...
        return $this->hasMany(KecocokanLahan::class);
    }
}
