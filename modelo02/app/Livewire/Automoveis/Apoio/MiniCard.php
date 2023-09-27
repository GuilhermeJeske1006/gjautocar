<?php

namespace App\Livewire\Automoveis\Apoio;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class MiniCard extends Component
{
    #[Reactive] 
    public $item;
 
    public function mount($item = null)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.automoveis.apoio.mini-card');
    }
}
