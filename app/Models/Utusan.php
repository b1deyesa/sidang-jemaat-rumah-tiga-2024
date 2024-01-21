<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pesertas(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }
}
