<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class GerantAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'gerant_admins';
    protected $primaryKey = 'id';
 
    protected $fillable = [
        
        'name','email','password','role',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isGerant()
{
    return $this->role === 'gerant';
}

}
