<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'prixParMois',
        'reservation_id',
        'modele',
        'contenu'

    ];

    public function reservation()
    {
        return $this->belongsTo(Reserverboxes::class, 'reservation_id');
    }

    public function modele()
    {
        return $this->belongsTo(ContractTemplate::class, 'modele');
    }

}
