<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Automovel;
use App\Models\CategoriaAutomovel;
use App\Http\Resources\SiteResource;
use App\Models\TipoAutomovel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->logo = Storage::disk('s3')->url("empresas/".$empresa->logo);

        $endereco = Endereco::findOrFail($empresa->endereco_id);

        $automoveis = $this->getAutomoveis($empresa, $request->input('search'), $request, $request->input('ordenacao'));
        $categoriasAutomovel = $this->getCategoriasAutomovel();
        $tipoAutomovel = $this->getTipoAutomovel();

        return new SiteResource($empresa, $endereco, $automoveis, $categoriasAutomovel, $tipoAutomovel);
    }

    private function getAutomoveis(Empresa $empresa, $search = null, $filtro = null, $ordenacao = null)
    {
        $query = $empresa->automoveis()->where('ir_para_site', true);

        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }

        if ($ordenacao) {
            if ($ordenacao == "recente") {
                $query->orderBy('created_at', 'desc');
            } elseif ($ordenacao == "antigo") {
                $query->orderBy('created_at', 'asc');
            } elseif ($ordenacao == "menor") {
                $query->orderBy('valor', 'asc');
            } elseif ($ordenacao == "maior") {
                $query->orderBy('valor', 'desc');
            }
        }

        if ($filtro) {
            Log::debug('Conteúdo de $filtro:', [$filtro]);

            if ($filtro->ano !== null) {
                $query->where('ano', $filtro->ano);
            }

            if ($filtro->valor_min !== null && $filtro->valor_max !== null) {
                $query->whereBetween('valor', [$filtro->valor_min, $filtro->valor_max]);
            }

            if ($filtro->marca !== null) {
                $query->where('marca_id', $filtro->marca);
            }

            if ($filtro->modelo !== null) {
                $query->where('modelo_id', $filtro->modelo);
            }

            if ($filtro->tipo !== null) {
                $query->where('tipo_automovel_id', $filtro->tipo);
            }

            if ($filtro->cambio !== null) {
                $query->where('cambio', $filtro->cambio);
            }

            if ($filtro->motor !== null) {
                $query->where('motor', $filtro->motor);
            }

            if ($filtro->combustivel !== null) {
                $query->where('tipo_combustivel', $filtro->combustivel);
            }

            if ($filtro->qtd_portas !== null) {
                $query->where('qtd_portas', $filtro->qtd_portas);
            }

            if ($filtro->cor !== null) {
                $query->where('cor', $filtro->cor);
            }

            if ($filtro->ano_min !== null && $filtro->ano_max !== null) {
                $anoMin = substr($filtro->ano_min, 0, 4); 
                $anoMax = substr($filtro->ano_max, 0, 4); 
                
                $query->whereRaw("SUBSTRING(ano, 1, 4) BETWEEN '$anoMin' AND '$anoMax'");
            }
            

            if ($filtro->categoria !== null) {
                $query->where('categoria_id', $filtro->categoria);
            }
        }

        $automoveis = $query->get();

        foreach ($automoveis as $automovel) {
            $automovel->foto_capa = Storage::disk('s3')->url("automovel/" . $automovel->foto_capa);
            foreach ($automovel->fotos as $foto) {
                $foto->foto = Storage::disk('s3')->url("automovel/" . $foto->foto);
            }
        }

        return $automoveis;
    }


    private function getCategoriasAutomovel()
    {
        return CategoriaAutomovel::all();
    }

    private function getTipoAutomovel()
    {
        return TipoAutomovel::all();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
