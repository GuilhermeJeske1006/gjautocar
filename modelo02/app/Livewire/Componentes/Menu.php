<?php

namespace App\Livewire\Componentes;

use App\Helpers\ApiHelper;
use Livewire\Component;

class Menu extends Component
{
    public $site;

    public function mount(){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);
       
        $this->site = $dataObj->data; 
   }
    
    public function render()
    {
        return view('livewire.componentes.menu');
    }
}
