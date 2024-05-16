<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharacterShopping  extends Model
{
    use HasFactory;
    protected $table = 'character_shopping';

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
