<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_pers',
        'prenom_pers',
        'email_pers',
        'phone_pers',
        'quantity',
        'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
