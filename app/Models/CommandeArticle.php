<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeArticle extends Model
{
    use HasFactory;
    
    public $table = "commande_article";
    protected $primaryKey = ['commande_id', 'article_id'];
    public $incrementing = false;
    protected $keyType = 'int';
}
