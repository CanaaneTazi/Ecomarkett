<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartePaiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date',
    ];

    protected $hidden = [
        'numero',
        'cvc',
    ];

    protected function casts(): array
    {
        return [
            'numero' => 'hashed',
            'cvc' => 'hashed',
        ];
    }
}
