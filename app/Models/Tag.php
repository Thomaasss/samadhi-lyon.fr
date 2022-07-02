<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function yogas() {
        return $this->belongsToMany(
            Yoga::class,
            "entite_tags",
            'tag_id',
            'entite_id'
        );
    }

    public function therapies() {
        return $this->belongsToMany(
            Therapie::class,
            "entite_tags",
            'tag_id',
            'entite_id'
        );
    }

    public function getNbEntitesAttribute() {
        return count($this->yogas) + count($this->therapies);
    }
}
