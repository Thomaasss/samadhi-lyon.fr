<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapieCategorie extends Model
{
    use HasFactory;

    public function therapies() {
        return $this->hasMany(Therapie::class, 'categorie_id');
    }
}
