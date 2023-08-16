<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Resources\EmpresaResource;
use App\Models\Endereco;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmpresaResource::collection(Empresa::paginate(15));

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
        $validated = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|max:255|unique:empresas',
            'cor' => 'required',
            'endereco_id' => 'required'
        ]);

        Empresa::create($request->all());
    
        return response()->json(["message" => "Empresa cadastrada com sucesso"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::join('enderecos', 'enderecos.id', '=', 'empresas.endereco_id')
        ->findOrFail($id);

        $empresa->logo = Storage::disk('s3')->url("empresas/".$empresa->logo);

        
        if (!$empresa) {
            return response()->json(["message" => "Empresa não encontrada"], 404);
        }
        return EmpresaResource::make($empresa);
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
        try{
            DB::beginTransaction();

            $empresa = Empresa::find($id);

            if (!$empresa) {
                return response()->json(["message" => "Empresa não encontrada"], 404);
            }

            $base64Image = $request->input('logo');

            if ($base64Image !== null) {
            
                if (!Str::contains($base64Image, 'https')) {
                    list($type, $base64Image) = explode(';', $base64Image);
                    list(, $base64Image) = explode(',', $base64Image);
                    $imageData = base64_decode($base64Image);
                    $imageName = 'image_' . time() . '.png';
                    $filePath = 'empresas/' . $imageName;
                    Storage::disk('s3')->put($filePath, $imageData, 'public');
                    $empresa->logo = $imageName;
                } 
            } else {
                $empresa->logo = null;
            }
            
            $empresa->nome = $request->nome;
            $empresa->email = $request->email;
            $empresa->whatsapp = $request->whatsapp;
            $empresa->instagram = $request->instagram;
            $empresa->facebook = $request->facebook;
            $empresa->telefone = $request->telefone;
            $empresa->cor = $request->cor;
            $empresa->descricao = $request->descricao;
            $empresa->palavras_chaves = $request->palavras_chaves;
            $empresa->titulo = $request->titulo;
            $empresa->update();


            $endereco = Endereco::find($request->endereco_id);
            $endereco->rua = $request->endereco['rua'];
            $endereco->bairro = $request->endereco['bairro'];
            $endereco->cidade = $request->endereco['cidade'];
            $endereco->estado = $request->endereco['estado'];
            $endereco->pais = $request->endereco['pais']; 
            $endereco->complemento = $request->endereco['complemento']; 
            $endereco->numero = $request->endereco['numero']; 
            $endereco->save(); 


            DB::commit();
            return response()->json(["message" => "Empresa editada com sucesso"], 201);

        } catch (\Exception $e){
            return  $e;
            return response()->json(["message" => $e], 500);
            DB::rollBack();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $empresa = Empresa::find($id);
    
        if (!$empresa) {
            return response()->json(["message" => "Empresa não encontrada"], 404);
        }
    
        $empresa->delete();
    
        return response()->json(["message" => "Empresa excluída com sucesso"], 200);
    }
}
