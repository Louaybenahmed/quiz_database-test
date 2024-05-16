<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $table = 'Player';

    protected $primaryKey = 'idPlayer';
    protected $fillable = ['userName', 'email', 'password', 'score', 'gold'];

    public function characterShoppings()
    {
        return $this->hasMany(CharacterShopping::class, 'idPlayer');
    }

    public function parties()
    {
        return $this->hasMany(Partie::class, 'idPlayer');
    }
}

