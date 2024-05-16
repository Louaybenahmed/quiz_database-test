<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class

class Categorie extends Model
{
    protected $table = 'Categorie';

    protected $primaryKey = 'idCategorie';
    protected $fillable = ['CategorieName', 'CategorieDescription'];

    public function parties()
    {
        return $this->hasMany(Partie::class, 'idCategorie');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'idCategorie');
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'Level_Categorie', 'idCategorie', 'levelNumber');
    }
}
