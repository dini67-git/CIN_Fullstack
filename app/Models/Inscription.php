<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['formation_id', 'nom', 'prenom', 'telephone', 'email', 'montant_paye', 'status'];

    public function formation(){
        return $this->belongsTo(Formation::class);
    }
}
