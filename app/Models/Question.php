<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class

class Question extends Model
{
    protected $table = 'Question';

    protected $primaryKey = 'idQuestion';
    protected $fillable = ['containt', 'correctAnswer', 'goldQuestion'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'idLevel');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie');
    }

    public function possibleAnswers()
    {
        return $this->hasMany(PossibleAnswer::class, 'idQuestion');
    }
}