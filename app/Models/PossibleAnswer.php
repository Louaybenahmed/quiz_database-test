<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class


class PossibleAnswer extends Model
{
    protected $table = 'PossibleAnswer';

    protected $primaryKey = 'idPossibleAnswer';
    protected $fillable = ['possibleAnswer'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'idQuestion');
    }
}