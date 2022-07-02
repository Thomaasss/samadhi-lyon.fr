<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Therapie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    public function tags() {
        $database = $this->getConnection()->getDatabaseName();
        return $this->belongsToMany(
            Tag::class,
            "entite_tags",
            'entite_id',
            'tag_id'
        )->where('entite', 'therapie');
    }

    public function getAgeAttribute() {
        $date = new DateTime($this->updated_at);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->format('%a') .' jours';
    }

    public function prof() {
        return $this->belongsTo(Professionnel::class, 'professionnel_id');
    }

    public function avis() {
        return $this->hasMany(Avis::class, 'discipline_id')->where('discipline', 'therapie');
    }

    public function avisActive() {
        return $this->hasMany(Avis::class, 'discipline_id')->where('discipline', 'therapie')->where('is_active', 1);
    }

    public function tarifs() {
        return $this->hasMany(TherapiesTarif::class, 'therapie_id');
    }

    public function icone() {
        return $this->belongsTo(Icone::class, 'icon_id');
    }
}
