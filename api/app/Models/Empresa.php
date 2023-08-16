<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'logo',
        'whatsapp',
        'instagram',
        'facebook',
        'telefone',
        'cor',
        'descricao',
        'palavras_chaves',
        'titulo',
        'endereco_id',
    ];

    public function automoveis()
    {
        return $this->hasMany(Automovel::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
