<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Commande;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'quantite',
        'prix',
        'fichier',
        'fichier_url',
        "user_id"
    ];

    public function personne(){
        return $this->belongsTo(User::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
