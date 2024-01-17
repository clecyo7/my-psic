<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
         'description',
         'email_company',
         'email_responsible', 
         'phone', 
         'cep', 
         'logradouro', 
         'number', 
         'bairro', 
         'complemento', 
         'cidade', 
         'uf'
        ];
}
