<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class

class Level extends Model
{
    protected $table = 'Level';

    protected $primaryKey = 'levelNumber';
    protected $fillable = ['difficulty', 'description'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'idLevel');
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'Level_Categorie', 'levelNumber', 'idCategorie');
    }
}

