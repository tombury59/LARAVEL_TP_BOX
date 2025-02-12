<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserverboxes extends Model
{
    use HasFactory;

    protected $table = 'reserver_boxes';
    //	id	locataire_id	box_id	date_debut	date_fin	created_at	updated_at

    public $timestamps = false;
    protected $fillable = [
        'locataire_id',
        'box_id',
        'date_debut',
        'date_fin',
    ];

    public function locataire()
    {
        return $this->belongsTo(Locataires::class, 'locataire_id', 'id');
    }

    public function boxe()
    {
        return $this->belongsTo(Boxes::class, 'box_id', 'id');
    }

}
