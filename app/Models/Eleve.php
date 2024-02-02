<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
//    use HasFactory;

    protected $table = 'eleves';

    protected $fillable = [
        'nomComplet',
        'genre',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        //'classe',
        'niveau',
        'photo',
        'user_type',
        'is_delete'
    ];



    static function getEleve($id)
    {
        return Eleve::find($id);
    }

    static public function getEleves()
    {
        return self::select('eleves.*')
                ->where('is_delete', '=', 0)
                ->orderBy('id')
                ->get();
    }
}
