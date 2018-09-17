<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function categorie()
    {
        return $this->hasOne('App\Categorie');
    }
}
