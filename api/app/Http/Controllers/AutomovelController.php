<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Automovel;
use App\Models\ItemAutomovel;
use App\Models\FotoAutomovel;
use App\Http\Resources\AutomovelResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index($id = null, Request $request)
     {
         $query = Automovel::query();
 
         if ($request->has('name')) {
             $query->where('nome', 'like', '%' . $request->input('name') . '%');
         }
 
         if ($id) {
             $query->where('empresa_id', $id);
         }
 
         $automoveis = $query->paginate(15);
 
         // Obter a URL da imagem para cada automóvel
         foreach ($automoveis as $automovel) {
            if($automovel->foto_capa != ""){
                $automovel->foto_capa = Storage::disk('s3')->url("automovel/".$automovel->foto_capa);
            }
         }

         foreach ($automoveis as $automovel) {
            foreach($automovel->fotos as $foto) {
                if($foto->foto != ""){
                $foto->foto = Storage::disk('s3')->url("automovel/".$foto->foto );
                }
            }
        }
 
         return AutomovelResource::collection($automoveis);
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
        try{
            DB::beginTransaction();

            $base64Image = $request->input('foto_capa');
            list($type, $base64Image) = explode(';', $base64Image);
            list(, $base64Image) = explode(',', $base64Image);
            $imageData = base64_decode($base64Image);
            $imageName = 'image_' . time() . '.png';
            $filePath = 'automovel/' . $imageName;
            Storage::disk('s3')->put($filePath, $imageData, 'public');

            $automovel = new Automovel();
            $automovel->foto_capa = $imageName;
            $automovel->nome = $request->nome;
            $automovel->valor = $request->valor;
            $automovel->especificacao_modelo = $request->especificacao_modelo;
            $automovel->tipo_automovel_id = $request->tipo_automovel_id;
            $automovel->categoria_id = $request->categoria_id;
            $automovel->ano = $request->ano;
            $automovel->quilometragem = $request->quilometragem;
            $automovel->cambio = $request->cambio;
            $automovel->tipo_combustivel = $request->tipo_combustivel;
            $automovel->qtd_portas = $request->qtd_portas;
            $automovel->cor = $request->cor;
            $automovel->final_placa = $request->final_placa;
            $automovel->modelo_id = $request->modelo_id;
            $automovel->marca_id = $request->marca_id;
            $automovel->observacao = $request->observacao;
            $automovel->ir_para_site = $request->ir_para_site;
            $automovel->automovel_destaque = $request->automovel_destaque;
            $automovel->motor = $request->motor;
            $automovel->empresa_id = $request->empresa_id;
            $automovel->save();

            if(isset($request->itens)){
                foreach($request->itens as $item){
                    
                    $items = new ItemAutomovel();
                    $items->automovel_id = $automovel->id;
                    $items->nome_item = $item;
                    $items->save();
                }
            }

            if (isset($request->fotos)) {
                foreach ($request->fotos as $base64Image) {
                    list($type, $base64Image) = explode(';', $base64Image);
                    list(, $base64Image) = explode(',', $base64Image);
                    $imageData = base64_decode($base64Image);
                    $imageName = 'image_' . time() . '.png';
                    $filePath = 'automovel/' . $imageName;
                    Storage::disk('s3')->put($filePath, $imageData, 'public');
                    
                    $fotos = new FotoAutomovel();
                    $fotos->automovel_id = $automovel->id;
                    $fotos->foto = $imageName;
                    $fotos->save();
                }
            }


        DB::commit();
        return response()->json(["message" => "Automovel cadastrado com sucesso"], 201);

        } catch (\Exception $e){
            DB::rollBack();
            return response()->json(["message" => $e], 500);

        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $query = Automovel::query();
        $automovel = $query->find($id);

        $automovel->foto_capa = Storage::disk('s3')->url("automovel/".$automovel->foto_capa);


        if (!$automovel) {
            return response()->json(["message" => "Automovel não encontrada"], 404);
        }

        foreach($automovel->fotos as $foto) {
            $foto->foto = Storage::disk('s3')->url("automovel/".$foto->foto );
        }

        return AutomovelResource::make($automovel);
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
            
            $automovel = Automovel::find($id);

            if (!$automovel) {
                return response()->json(["message" => "Automovel não encontrada"], 404);
            }

            $base64Image = $request->input('foto_capa');
            if ($base64Image !== null) {
            
                if (!Str::contains($base64Image, 'https')) {
                    list($type, $base64Image) = explode(';', $base64Image);
                    list(, $base64Image) = explode(',', $base64Image);
                    $imageData = base64_decode($base64Image);
                    $imageName = 'image_' . time() . '.png';
                    $filePath = 'automovel/' . $imageName;
                    Storage::disk('s3')->put($filePath, $imageData, 'public');
                    $automovel->foto_capa = $imageName;
                } 
            } else {
                $automovel->foto_capa = null;
            }

            $automovel->nome = $request->nome;
            $automovel->valor = $request->valor;
            $automovel->tipo_automovel_id = $request->tipo_automovel[0]['id'];
            $automovel->categoria_id = $request->nome_categoria[0]['id'];
            $automovel->ano = $request->ano;
            $automovel->especificacao_modelo = $request->especificacao_modelo;
            $automovel->quilometragem = $request->quilometragem;
            $automovel->cambio = $request->cambio;
            $automovel->tipo_combustivel = $request->tipo_combustivel;
            $automovel->qtd_portas = $request->qtd_portas;
            $automovel->cor = $request->cor;
            $automovel->final_placa = $request->final_placa;
            $automovel->modelo_id = $request->nome_modelo[0]['id'];
            $automovel->marca_id = $request->marca_automovel[0]['id'];
            $automovel->observacao = $request->observacao;
            $automovel->ir_para_site = $request->ir_para_site;
            $automovel->automovel_destaque = $request->automovel_destaque;
            $automovel->motor = $request->motor;
            $automovel->empresa_id = $request->empresa_id;
            $automovel->update();

            if(isset($request->itens)){
                
                ItemAutomovel::where('automovel_id', $automovel->id)->delete();


                foreach ($request->itens as $item) {
                    $novoItem = new ItemAutomovel();
                    $novoItem->automovel_id = $automovel->id;
                    $novoItem->nome_item = $item['nome_item']; 
                    $novoItem->save();
                }
                
            }

            if (isset($request->fotos)) {

                    $fotosDoAutomovel = FotoAutomovel::where('automovel_id', $automovel->id)->get();

                    $fotosParaManter = [];
                    $fotosParaExcluir = [];
    
                    foreach ($fotosDoAutomovel as $fotoDoBanco) {
                        $fotoEncontrada = collect($request->fotos)->where('id', $fotoDoBanco->id)->first();
                        
                        if ($fotoEncontrada) {
                            $fotosParaManter[] = $fotoEncontrada;
                        } else {
                            $fotosParaExcluir[] = $fotoDoBanco;
                        }
                    }
    
                    foreach ($fotosParaExcluir as $fotoParaExcluir) {
                        $fotoParaExcluir->delete();
                    }
    
                    // Excluir fotos do S3 que não estão na request
                    foreach ($fotosParaExcluir as $fotoParaExcluir) {
                        $filePath = 'automovel/' . $fotoParaExcluir->foto;
                        Storage::disk('s3')->delete($filePath);
                    }
                
                foreach ($request->fotos as $base64Image) {
                    if ($base64Image['foto'] !== null) {

            
                        if (!Str::contains($base64Image['foto'], 'https')) {
                            list($type, $base64Image['foto']) = explode(';', $base64Image['foto']);
                            list(, $base64Image['foto']) = explode(',', $base64Image['foto']);
                            $imageData = base64_decode($base64Image['foto']);
                            $imageName = 'image_' . time() . '.png';
                            $filePath = 'automovel/' . $imageName;
                            Storage::disk('s3')->put($filePath, $imageData, 'public');
            
                            $fotos = new FotoAutomovel();
                            $fotos->automovel_id = $automovel->id;
                            $fotos->foto = $imageName;
                            $fotos->save();
                        } 
                    } 
                    
                }
            }

            DB::commit();
            return response()->json(["message" => "Automovel editada com sucesso"], 200);

        } catch (\Exception $e){
            DB::rollBack();
            return $e;
            return response()->json(["message" => $e], 500);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $automovel = Automovel::find($id);
    
        if (!$automovel) {
            return response()->json(["message" => "Automovel não encontrada"], 404);
        }
    
        $automovel->delete();
    
        return response()->json(["message" => "Automovel excluída com sucesso"], 200);
    }
}
