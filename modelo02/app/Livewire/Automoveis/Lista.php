<?php

namespace App\Livewire\Automoveis;

use Livewire\Component;
use App\Helpers\ApiHelper;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class Lista extends Component
{
    public $automovel;
    public $automoveisDestaque;
    public $automoveisRecentes;
    public $categorias;
    public $marcas;
    public $titulo;
    public $paginators;

    public $search;
    public $ordenacao;

    public function mount(Request $request)
    {
        $this->search = $request->search;
        $this->ordenacao = $request->ordenacao;

        $data = ApiHelper::getDataFromApi($this->search, $request, $this->ordenacao);
        $dataObj = json_decode($data);

        $data_marca = ApiHelper::getMarcaApi();
        $data_marca_Obj = json_decode($data_marca);

        $automoveis = $dataObj->data->automoveis;
        $automoveisFiltrados = collect($automoveis);

        // Definir a quantidade de itens por página
        $perPage = 10;

        // Obter o número total de itens
        $total = $automoveisFiltrados->count();

        // Criar uma instância do LengthAwarePaginator
        // $this->paginators = new LengthAwarePaginator(
        //     $automoveisFiltrados->forPage(request()->input('page'), $perPage),
        //     $total,
        //     $perPage,
        //     request()->input('page'),
        //     ['path' => request()->url()]
        // );

        $this->paginators = $automoveis;
        

        $this->categorias = $dataObj->data->categorias_automovel;
        $this->categorias = array_slice($this->categorias, 0, 8);
        $this->automoveisDestaque = collect($automoveis)->where('automovel_destaque', 1)->take(5);
        $this->automoveisRecentes = collect($automoveis)->sortByDesc('created_at')->take(3);
        $this->marcas = $data_marca_Obj->data;
        $this->titulo = "Automóveis - " . $dataObj->data->nome;
    }

    public function render()
    {
        return view('livewire.automoveis.lista', ['paginators' => $this->paginators]);
    }
}
