<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* RELATIONSHIPS */
    public function getCategoriesAttribute() {
        $relation = DB::table('contact_categories')
            ->where('contact_id', $this->id)
            ->get()
            ->pluck('categorie_id');

        $categories = CategorieChantier::whereIn('id', $relation)->get();

        return $categories;
    }
}
