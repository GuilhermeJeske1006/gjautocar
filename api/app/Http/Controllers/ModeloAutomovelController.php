<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModeloAutomovel;
use App\Http\Resources\ModeloAutomovelResource;

class ModeloAutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        if ($id) {
            $modelo = ModeloAutomovel::where('marca_id', $id)->get();
        }else{
            $modelo = ModeloAutomovel::all();
        }

        return ModeloAutomovelResource::collection($modelo);
    }

    
}
