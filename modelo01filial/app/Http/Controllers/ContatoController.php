<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContato;

class ContatoController extends Controller
{
    public function index($id){

        $data = ApiHelper::getDataFromApi($id);
        $dataObj = json_decode($data);

        $item = $dataObj->data;

        $titulo = "Contato - " . $item->nome;

        return view('contato.index', compact('item', 'titulo'));
    }

    public function enviarFormulario(Request $request)
    {
        $data = ApiHelper::getDataFromApi(1);
        $dataObj = json_decode($data);

        $item = $dataObj->data;
        
        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'assunto' => $request->input('assunto'),
            'mensagem' => $request->input('mensagem'),
        ];

        $destinatarios = [
            $item->email
        ];

        Mail::to($destinatarios)->send(new FormularioContato($dados));

        return redirect()->route('contato')->with('success', 'Formulário enviado com sucesso!');
    }

}
