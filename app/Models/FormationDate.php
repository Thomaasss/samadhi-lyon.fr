<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationDate extends Model
{
    use HasFactory;

    public function elements()
    {
        return $this->hasMany(FormationDateElement::class, 'formation_date_id');
    }
}
