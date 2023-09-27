<?php

namespace App\Livewire\Automoveis\Apoio;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Card extends Component
{
    #[Reactive] 
    public $item;
 
    public function mount($item = null)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.automoveis.apoio.card');
    }
}
