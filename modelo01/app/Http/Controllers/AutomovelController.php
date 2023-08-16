<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Helpers\ApiHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContato;

class AutomovelController extends Controller
{
    public function index(Request $request){

        $data = ApiHelper::getDataFromApi($request->search, $request, $request->ordenacao);
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
        $automovel = new LengthAwarePaginator(
            $automoveisFiltrados->forPage(request()->input('page'), $perPage),
            $total,
            $perPage,
            request()->input('page'),
            ['path' => request()->url()]
        );

        $categorias = $dataObj->data->categorias_automovel;

        $categorias = array_slice($categorias, 0, 8);

        $automoveisDestaque = collect($automoveis)->where('automovel_destaque', 1)->take(5);

        $automoveisRecentes = collect($automoveis)->sortByDesc('created_at')->take(3);

        $marcas = $data_marca_Obj->data;

        $titulo = "Automóveis - " . $dataObj->data->nome;

        return view('automovel.lista.index', compact(
        'automovel', 
        'automoveisDestaque', 
        'automoveisRecentes',
        'categorias',
        'marcas',
        'titulo'
    ));
    }


    public function show($id){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $automoveis = $dataObj->data->automoveis;

        $item = collect($automoveis)->where('id', $id)->first();

        $automoveisDestaque = collect($automoveis)->where('automovel_destaque', true)->take(5);

        $automoveisRecentes = collect($automoveis)->sortByDesc('created_at')->take(3);

        $categorias = $dataObj->data->categorias_automovel;

        $categorias = array_slice($categorias, 0, 8);

        $site = $dataObj->data;

        $titulo = "Automóvel - " . $item->nome;

        return view('automovel.detalhes.index', compact('item','automoveisDestaque', 'automoveisRecentes', 'categorias', 'site', 'titulo'));
    }

    public function favoritos() {
        $automoveisSession = session()->get('automoveis', []); // Obter o array de IDs da sessão
    
        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);
    
        $automoveisApi = $dataObj->data->automoveis;
    
        // Filtrar os automóveis da API pelos IDs da sessão
        $automoveis = collect($automoveisApi)->filter(function ($automovel) use ($automoveisSession) {
            return in_array($automovel->id, $automoveisSession);
        });
    
        $titulo = "Favoritos - " . $dataObj->data->nome;
    
        return view('favoritos.index', compact('automoveis', 'titulo'));
    }
    
    

    public function addFavoritos(Request $request) {
        $item = $request->input('item'); 
        // $itemId = $item['id']; // Supondo que o ID do automóvel está em 'id'
    
        $automoveis = session()->get('automoveis', []); 
        
        // Verificar se o ID já existe no array da sessão
        $existingIds = array_column($automoveis, 'id');
        if (!in_array($item, $existingIds)) {
            $automoveis[] = $item; 

            session()->put('automoveis', $automoveis);
        }
        
        return redirect()->back()->with('success', 'Automóvel adicionado com sucesso!');;
    }

    public function removeFavoritos(Request $request) {
        
        $itemId = $request->input('item'); // Supondo que o ID do automóvel é passado como 'item_id'
    
        $automoveis = session()->get('automoveis', []);
    
        // Encontrar o índice do automóvel com o ID especificado
        $itemIndex = array_search($itemId, array_column($automoveis, 'id'));
    
        if ($itemIndex !== false) {
            // Remover o automóvel da lista de favoritos
            array_splice($automoveis, $itemIndex, 1);
            session()->put('automoveis', $automoveis);
        }
    
        return redirect()->back()->with('success', 'Automóvel removido com sucesso!');
    }
    
    

    public function enviarInteresse(Request $request){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $item = $dataObj->data;
        
        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'assunto' => "interrese em um Automóvel",
            'mensagem' => $request->input('mensagem'),
        ];

        // Lista de emails para os quais você quer enviar
        $destinatarios = [
            $item->email
        ];

        // Enviar o e-mail com os dados do formulário para todos os destinatários
        Mail::to($destinatarios)->send(new FormularioContato($dados));

        return redirect()->back()->with('success', 'Formulário enviado com sucesso!');

    }
    

}
