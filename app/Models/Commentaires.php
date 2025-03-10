<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentaire',
        'note',
        'article_id',
        'user_id',
    ];
}
