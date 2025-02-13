<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'content'];

    protected $table = 'contract_templates';
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
