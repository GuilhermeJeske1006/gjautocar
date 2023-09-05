<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;


class AnuncieController extends Controller
{
    public function index(){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $item = $dataObj->data;

        $titulo = "Anuncie conosco - " . $item->nome;

        return view('anuncie.index', compact('titulo'));
    }
}
