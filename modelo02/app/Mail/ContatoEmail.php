<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContatoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dadosFormulario;

    /**
     * Create a new message instance.
     *
     * @param  array  $dadosFormulario
     * @return void
     */
    public function __construct($dadosFormulario)
    {
        $this->dadosFormulario = $dadosFormulario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('email.contato')
                    ->with('dadosFormulario', $this->dadosFormulario)
                    ->subject('Formulário Enviado');
    }
}
