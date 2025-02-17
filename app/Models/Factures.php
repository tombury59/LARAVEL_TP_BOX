<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factures extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'factures';
    protected $fillable = [
        'numero_facture',
        'payement_date',
        'montant_facture',
        'periode_facture',
        'contrat_id',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }


}
