<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partie extends Model
{
    use HasFactory;
    protected $table = 'Partie';

    protected $primaryKey = 'idPartie';
    protected $fillable = ['levelReached'];

    public function player()
    {
        return $this->belongsTo(Player::class, 'idPlayer');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie');
    }
}