<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class SobreController extends Controller
{
    public function index(){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $item = $dataObj->data;

        $titulo = "Sobre nós - " . $item->nome;
        
        return view('sobre.index', compact('titulo'));
    }
}
