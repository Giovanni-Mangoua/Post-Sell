<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Conseil extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'conseil',
        'user_id'
    ];

    public function personne(){
        return $this->belongsTo(User::class);
    }
}
