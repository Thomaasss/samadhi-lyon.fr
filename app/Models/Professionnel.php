<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professionnel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function yogas() {
        return $this->hasMany(Yoga::class, 'professionnel_id');
    }

    public function getAgeAttribute() {
        $date = new DateTime($this->updated_at);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->format('%a') .' jours';
    }

    public function getIntituleCommunAttribute() {
        return $this->nom;
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getdisciplinesCountAttribute() {
        $therapies = Therapie::where('professionnel_id', $this->id)->count();
        $yogas = Yoga::where('professionnel_id', $this->id)->count();
        return $therapies + $yogas;
    }

    public function therapies() {
        return $this->hasMany(Therapie::class, 'professionnel_id');
    }

    public function getRoleAttribute() {
        if(count($this->yogas) && count($this->therapies)) {
            return 'Professeur & thérapeute';
        } elseif(count($this->yogas) > 0 && count($this->therapies) === 0) {
            return "Professeur de yoga";
        } elseif(count($this->yogas) === 0 && count($this->therapies) > 0) {
            return "Thérapeute";
        } else {
            return "Aucun rôle";
        }
    }
}
