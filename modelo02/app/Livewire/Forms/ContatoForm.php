<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ContatoForm extends Form
{
    #[Rule('required|min:5')]
    public ?string $nome = '';
 
    #[Rule('required|email')]
    public ?string $email = '';
    
}
