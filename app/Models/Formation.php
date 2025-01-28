<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'prix', 'date_debut', 'date_fin', 'image'];

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
