<?php

namespace App\Livewire\Automoveis;

use Livewire\Component;
use App\Helpers\ApiHelper;

class Detalhes extends Component
{
    public $id;
    public $item;
    public $automoveisDestaque;
    public $automoveisRecentes;
    public $categorias;
    public $site;
    public $titulo;

    public function mount($id)
    {
        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $automoveis = $dataObj->data->automoveis;

        $this->item = collect($automoveis)->where('id', $id)->first();

        $this->automoveisDestaque = collect($automoveis)->where('automovel_destaque', true)->take(5);

        $this->automoveisRecentes = collect($automoveis)->sortByDesc('created_at')->take(3);

        $categorias = $dataObj->data->categorias_automovel;

        $this->categorias = array_slice($categorias, 0, 8);

        $this->site = $dataObj->data;

        $this->titulo = "Automóvel - " . $this->item->nome;
    }

    public function render()
    {
        return view('livewire.automoveis.detalhes');
    }
}

