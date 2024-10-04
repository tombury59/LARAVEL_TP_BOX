<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typepayement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'type_payement_id';
    protected $table = 'type_payement';
    protected $fillable = [
        'type_payement',
    ];
}
