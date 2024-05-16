<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class

class CharacterShopping  extends Model
{
    protected $table = 'CharacterShopping';

    protected $primaryKey = 'shopping_id';
    protected $fillable = ['shopping_date'];

    public function player()
    {
        return $this->belongsTo(Player::class, 'idPlayer');
    }

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
