<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    /** @use HasFactory<\Database\Factories\BoxesFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'boxes';
    protected $fillable = [
        'proprietaire_id',
        'name',
        'description',
        'address',
        'price',
        'status',
        'taille',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proprietaire()
    {
        return $this->belongsTo(User::class, 'proprietaire_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reserverboxes::class,'box_id');
    }

    public function dernierReservationActive()
    {
        // Return the query builder instance for the active reservation
        return $this->reservations()
            ->where('date_fin', '>=', now())
            ->where('date_debut', '<=', now());
    }


}
