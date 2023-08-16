<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemAutomovel;
use App\Models\FotoAutomovel;


class Automovel extends Model
{
    use HasFactory;

    protected $table = 'automoveis';

    protected $fillable = [
        'id',
        'nome',
        'ano',
        'cambio'
    ];

    public function itens()
    {
        return $this->hasMany(ItemAutomovel::class);
    }

    public function fotos()
    {
        return $this->hasMany(FotoAutomovel::class);
    }

    
}
