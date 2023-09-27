<?php

namespace App\Livewire\Home\Apoio;

use Livewire\Component;

class Banner extends Component
{
    public $categorias;
    public $marcas;
    public $site;
 
    public function mount($marcas = null, $categorias = null, $site = null)
    {
        $this->marcas = $marcas;
        $this->categorias = $categorias;
        $this->site = $site;
    }

    public function render()
    {
        return view('livewire.home.apoio.banner');
    }
}
