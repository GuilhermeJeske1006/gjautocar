<?php

namespace App\Models;
use App\Models\Automovel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAutomovel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome_item',
        'automovel_id'
    ];

    public function automovel()
    {
        return $this->belongsTo(Automovel::class);
    }
}
