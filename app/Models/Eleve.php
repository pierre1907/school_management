<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
//    use HasFactory;

    protected $table = 'eleves';

    protected $fillable = [
        'nonComplet',
        'genre',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        //'classe',
        'niveau',
        'photo',
    ];
}
