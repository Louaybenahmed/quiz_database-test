<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PossibleAnswer extends Model
{
    use HasFactory;
    protected $table = 'PossibleAnswer';

    protected $primaryKey = 'idPossibleAnswer';
    protected $fillable = ['possibleAnswer'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'idQuestion');
    }
}