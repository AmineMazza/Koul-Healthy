<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineCommande extends Model
{
    use HasFactory;

    protected $fillable = ['
        qte_commandée'
    ];

    public function commande()
    {
        return $this->belongsTo(commande::class);
    }

    public function produit()
    {
        return $this->belongsTo(Product::class);
    }
}
