<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'category_id',
        'user_id', 
    ];

    public function category()
    {
        return $this->belongsTo(categorie::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function lineCommandes()
    {
        return $this->hasMany(LineCommande::class);
    }

}
