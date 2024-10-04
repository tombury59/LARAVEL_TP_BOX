<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataires extends Model
{
    use HasFactory;

    protected $table = 'locataires';

//primary key locataire_id
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

    //dans la table ReserverBoxes id locataire_id box_id date_debut date_fin
    public function boxes()
    {
        return $this->belongsToMany(Boxes::class, 'reserver_boxes', 'locataire_id', 'box_id')->withPivot('date_debut', 'date_fin');
    }

    public function reservation()
    {
        return $this->hasMany(ReserverBoxes::class, 'locataire_id', 'locataire_id');
    }
}
