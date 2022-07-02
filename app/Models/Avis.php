<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDisciplineObjAttribute() {
        if($this->discipline == 'therapie') {
            return Therapie::find($this->discipline_id);
        } elseif($this->discipline == 'yoga') {
            return Yoga::find($this->discipline_id);
        }
    }

    public function switchValidation() {
        $this->update([
            'is_active' => !$this->is_active
        ]);
        return $this->is_active;
    }

    public function getAgeAttribute() {
        $date = new DateTime($this->updated_at);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->format('%a') .' jours';
    }
}
