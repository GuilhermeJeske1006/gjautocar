<?php

namespace App\Http\Resources;

use App\Models\CategoriaAutomovel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MarcaAutomovel;
use App\Models\ModeloAutomovel;
use App\Models\TipoAutomovel;

class AutomovelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tipo_automovel = TipoAutomovel::where('id', $this->tipo_automovel_id)->get();
        $modelo_automovel = ModeloAutomovel::where('id', $this->modelo_id)->get();
        $marca_automovel = MarcaAutomovel::where('id', $this->marca_id)->get();
        $categoria_automovel = CategoriaAutomovel::where('id', $this->categoria_id)->get();

        return [
            "id"=> $this->id,
            "empresa_id"=> $this->empresa_id,
            "nome"=> $this->nome,
            "foto" => $this->foto_capa,
            "especificacao_modelo" => $this->especificacao_modelo,
            "ano"=> $this->ano,
            "quilometragem"=> $this->quilometragem,
            "cambio"=> $this->cambio,
            "tipo_combustivel"=> $this->tipo_combustivel,
            "cor"=> $this->cor,
            "qtd_portas"=> $this->qtd_portas ,
            "final_placa"=> $this->final_placa ,
            "observacao"=> $this->observacao,
            "tipo_automovel" => $tipo_automovel,
            "nome_modelo" => $modelo_automovel,
            "marca_automovel" => $marca_automovel,
            "foto_capa"=> $this->foto_capa,
            "motor"=> $this->motor,
            "automovel_destaque"=> $this->automovel_destaque,
            "ir_para_site"=> $this->ir_para_site,
            "valor"=> $this->valor,            
            "nome_categoria"=> $categoria_automovel,
            "itens" => $this->itens,
            "fotos" => $this->fotos,
            "created_at" => $this->created_at

        ];

        
        // return parent::toArray($request);
    }
}
