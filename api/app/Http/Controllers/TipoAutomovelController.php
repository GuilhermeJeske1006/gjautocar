<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAutomovel;
use App\Http\Resources\TipoAutomovelResource;

class TipoAutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoAutomovelResource::collection(TipoAutomovel::all());

    }
}
