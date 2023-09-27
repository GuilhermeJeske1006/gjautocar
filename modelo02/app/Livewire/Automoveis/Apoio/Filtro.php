<?php

namespace App\Livewire\Automoveis\Apoio;

use App\Helpers\ApiHelper;
use Livewire\Component;
use Illuminate\Http\Request;

class Filtro extends Component
{
    public $marcas;
    public $categorias;
    public $paginators;
    public $request = [];

    public function pesquisar(Request $request)
    {
        dd($request);

        $data = ApiHelper::getDataFromApi(null, $request);
        $data = json_decode($data);
        $this->paginators = $data->data->automoveis;
    }

    public function mount($marcas = null, $categorias = null)
    {
        $this->categorias = $categorias;
        $this->marcas = $marcas;
    }
    public function render()
    {

        return view('livewire.automoveis.apoio.filtro', ['paginators' => $this->paginators]);
    }
}
