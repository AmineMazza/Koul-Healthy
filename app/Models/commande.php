<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;


    protected $fillable = [
        'date_commande',
        'statut_commande',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lineCommande()
    {
        return $this->hasMany(LineCommande::class);
    }
}
