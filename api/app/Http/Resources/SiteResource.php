<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AutomovelResource;
use App\Models\Automovel;
use App\Models\CategoriaAutomovel;
use App\Models\Endereco;

class SiteResource extends JsonResource
{
    public function __construct($empresa, $endereco, $automoveis, $categoriasAutomovel, $tipoAutomovel)
    {
        $this->empresa = $empresa;
        $this->endereco = $endereco;
        $this->automoveis = $automoveis;
        $this->categoriasAutomovel = $categoriasAutomovel;
        $this->tipoAutomovel = $tipoAutomovel;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->empresa->id,
            'nome' => $this->empresa->nome,
            'logo' => $this->empresa->logo,
            'email' => $this->empresa->email,
            'whatsapp' => $this->empresa->whatsapp,
            'instagram' => $this->empresa->instagram,
            'facebook' => $this->empresa->facebook,
            'telefone' => $this->empresa->telefone,
            'scripts' => $this->empresa->scripts,
            'cor' => $this->empresa->cor,
            'descricao' => $this->empresa->descricao,
            'palavras_chaves' => $this->empresa->palavras_chaves,
            'titulo' => $this->empresa->titulo,
            
            'endereco' => [
                'rua' => $this->endereco->rua,
                'bairro' => $this->endereco->bairro,
                'cidade' => $this->endereco->cidade,
                'estado' => $this->endereco->estado,
                'pais' => $this->endereco->pais,
                'complemento' => $this->endereco->complemento,
                'numero' => $this->endereco->numero,
            ],
            'automoveis' => AutomovelResource::collection($this->automoveis),
            'categorias_automovel' => $this->categoriasAutomovel,
            'tipo_automovel' => $this->tipoAutomovel
        ];
    }
}

