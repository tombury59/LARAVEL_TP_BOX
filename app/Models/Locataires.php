<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataires extends Model
{
    use HasFactory;

    protected $table = 'locataires';
    protected $primaryKey = 'locataire_id';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'ville',
        'code_postal',
        'pays'
    ];

    public function boxes()
    {
        return $this->belongsToMany(Boxes::class, 'reserver_boxes', 'locataire_id', 'box_id')->withPivot('date_debut', 'date_fin');
    }

    public function reservation()
    {
        return $this->hasMany(ReserverBoxes::class, 'locataire_id', 'locataire_id');
    }
}
