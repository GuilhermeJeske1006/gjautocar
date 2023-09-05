<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'logo' => $this->logo,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'telefone' => $this->telefone,
            'scripts' => $this->scripts,
            'cor' => $this->cor,
            'descricao' => $this->descricao,
            'palavras_chaves' => $this->palavras_chaves,
            'titulo' => $this->titulo,
            'endereco_id' => $this->endereco_id,
            'endereco' => [
                'rua' => $this->rua,
                'bairro' => $this->bairro,
                'cidade' => $this->cidade,
                'estado' => $this->estado,
                'pais' => $this->pais,
                'cep' => $this->cep,
                'complemento' => $this->complemento,
                'numero' => $this->numero,
            ]
        ];
    }
}
