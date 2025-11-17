<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
   
    protected $fillable = [
        'nome_completo',
        'cpf',
        'data_nascimento',
        'celular',
        'email',
        'curso',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'password',
        'role_id'
    ];
}
