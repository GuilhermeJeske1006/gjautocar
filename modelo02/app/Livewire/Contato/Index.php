<?php

namespace App\Livewire\Contato;

use Livewire\Component;
use App\Helpers\ApiHelper;
use App\Livewire\Forms\ContatoForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use Illuminate\Http\Request;


class Index extends Component
{
    public $nome;
    public $email;
    public $telefone;
    public $assunto;
    public $mensagem;
    public $item;
    public $titulo;

    public function enviar(Request $request)
    {

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $item = $dataObj->data;

        $dados = [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'assunto' => $this->assunto,
            'mensagem' => $this->mensagem,
        ];

        $destinatarios = [
            $item->email
        ];

        Mail::to($destinatarios)->send(new ContatoEmail($dados));

        session()->flash('success', 'Formulário enviado com sucesso!');

        return redirect()->route('contato');
    }

    public function mount()
    {
        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $this->item = $dataObj->data;

        $this->titulo = "Contato - " . $this->item->nome;
    }

    public function render()
    {
        return view('livewire.contato.index');
    }
}
