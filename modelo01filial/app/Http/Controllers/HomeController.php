<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Spatie\FlareClient\View;

class HomeController extends Controller
{
    public function index($id){


        $data = ApiHelper::getDataFromApi($id);
        $data_marca = ApiHelper::getMarcaApi();
        $dataObj = json_decode($data);
        $data_marca_Obj = json_decode($data_marca);


        $automoveis = $dataObj->data->automoveis;

        $automovel = collect($automoveis)->where('automovel_destaque', 1)->take(5);

        $site = $dataObj->data;

        $categorias = $dataObj->data->categorias_automovel;

        $marcas = $data_marca_Obj->data;

        $titulo = "Home - " . $site->nome;
        
        return view('home.index', compact('automovel', 'site', 'categorias', 'marcas', 'titulo'));

    }

    public function inicial(){
        return view('welcome');
    }
}
