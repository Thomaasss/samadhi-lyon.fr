<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    public function formateur()
    {
        return $this->belongsTo(Professionnel::class, 'professionnel_id');
    }

    public function dates()
    {
        return $this->hasMany(FormationDate::class, 'formation_id');
    }

    public function tarifs()
    {
        return $this->hasMany(FormationTarif::class, 'formation_id');
    }

    public function icone() {
        return $this->belongsTo(Icone::class, 'icon_id');
    }
}
