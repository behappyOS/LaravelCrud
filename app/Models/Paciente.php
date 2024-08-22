<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'mae',
        'nascimento',
        'cpf',
        'cns',
        'endereco',
        'photo',
    ];

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/\D/', '', $value);
    }

    public function setCnsAttribute($value)
    {
        $this->attributes['cns'] = preg_replace('/\D/', '', $value);
    }
}

