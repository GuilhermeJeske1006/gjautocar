<?php

namespace App\Livewire\Automoveis\Apoio;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Paginacao extends Component
{
    #[Reactive] 
    public $paginator;
 
    public function mount($paginator = null)
    {
        $this->paginator = $paginator;
    }

    public function render()
    {
        return view('livewire.automoveis.apoio.paginacao');
    }
}
