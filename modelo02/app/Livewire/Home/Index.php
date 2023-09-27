<?php

namespace App\Livewire\Home;

use App\Helpers\ApiHelper;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;


class Index extends Component
{
    public $automovel;
    public $site;
    public $categorias;
    public $marcas;
    public $titulo;

    public function mount()
    {
        $data = ApiHelper::getDataFromApi();
        $data_marca = ApiHelper::getMarcaApi();
        $dataObj = json_decode($data);
        $data_marca_Obj = json_decode($data_marca);

        $automoveis = $dataObj->data->automoveis;
        $this->automovel = collect($automoveis)->where('automovel_destaque', 1)->take(5);

        $this->site = $dataObj->data;
        $this->categorias = $dataObj->data->categorias_automovel;
        $this->marcas = $data_marca_Obj->data;
        $this->titulo = "Home - " . $this->site->nome;
    }

    public function render() : View
    {
        return view('livewire.home.index');
    }
}
