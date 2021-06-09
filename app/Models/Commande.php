<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function articles(){
        return $this->belongsToMany(Article::class,'commande_article');
    }
}
