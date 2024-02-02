<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'registro_ans', 'cidade', 'uf', 'dias_retorno', 'limite_diario'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
