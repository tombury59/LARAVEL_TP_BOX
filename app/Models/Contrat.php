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
        'proprietaire_id',
        'locataire_id',
        'box_id',
        'modele',
        'contenu',
        'date_debut',
        'date_fin'
    ];

    public function proprietaire()
    {
        return $this->belongsTo(User::class, 'proprietaire_id');
    }

    public function locataire()
    {
        return $this->belongsTo(Locataires::class, 'locataire_id');
    }

    public function box()
    {
        return $this->belongsTo(Boxes::class, 'box_id');
    }
}
