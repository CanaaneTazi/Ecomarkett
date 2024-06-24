<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Article extends Model
{
    use HasFactory, Notifiable;

    public function category()
    {
        return $this->belongsTo(categorie::class);
    }

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'remise',
        'vendable',
        'marque',
        'image',
        'categorie_id',
    ];

    public function getImageUrl(){
        if($this->image){
            return url('storage/'.$this->image);
        }
    }
    public static function findByCategorieOrFail($id)
    {
        $result = self::where('categorie_id', $id)->get();

        if (is_null($result)) {
            throw (new ModelNotFoundException)->setModel(static::class, $id);
        }

        return $result;
    }

    public static function findBySearch($search)
    {
        dd($search);
        $result = self::where('titre', $search)->get();

        if (is_null($result)) {
            throw (new ModelNotFoundException)->setModel(static::class, $search);
        }

        return $result;
    }
}
