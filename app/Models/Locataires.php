<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataires extends Model
{
    use HasFactory;

    protected $table = 'locataires';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'payement'
    ];

    public function boxes()
    {
        return $this->belongsToMany(Boxes::class, 'reserver_boxes', 'id', 'box_id')->withPivot('date_debut', 'date_fin');
    }

    public function reservations()
    {
        return $this->hasMany(ReserverBoxes::class, 'locataire_id', 'id');
    }

    public function typePayement()
    {
        return $this->belongsTo(TypePayement::class, 'payemement', 'id');
    }
}
