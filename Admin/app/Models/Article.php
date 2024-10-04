<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_article',
        'fichier',
        'user_id'
    ];

    public function personne(){
        return $this->belongsTo(User::class);
    }
}
