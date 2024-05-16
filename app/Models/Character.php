<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class

class Character extends Model
{
    protected $table = 'Character';

    protected $primaryKey = 'character_id';
    protected $fillable = ['character_name', 'character_photo', 'Description', 'Price'];

    public function characterShoppings()
    {
        return $this->hasMany(CharacterShopping::class, 'character_id');
    }
}