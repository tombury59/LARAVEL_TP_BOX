<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    /** @use HasFactory<\Database\Factories\BoxesFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $table = 'boxes';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
