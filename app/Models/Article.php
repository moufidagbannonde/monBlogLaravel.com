<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
    ];

    // un article peut avoir plusieurs commentaires
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // un article ne vient que d'un seul utilisateur
    public function user(){
        return $this->belongsTo(User::class);
    }
}
