<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sobre;
use App\Http\Resources\SobreResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SobreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $sobre = Sobre::where('empresa_id', $id)->first();

        $sobre->foto = Storage::disk('s3')->url("sobre/".$sobre->foto);

        if (!$sobre) {
            return response()->json(["message" => "sobre não encontrada"], 404);
        }

        return SobreResource::make($sobre);
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
        $sobre = Sobre::where('empresa_id', $id)->firstOrNew();

        $base64Image = $request->input('foto');
        
        if ($base64Image && !Str::contains($base64Image, 'https')) {
            list($type, $base64Image) = explode(';', $base64Image);
            list(, $base64Image) = explode(',', $base64Image);
            $imageData = base64_decode($base64Image);
            $imageName = 'image_' . time() . '.png';
            $filePath = 'sobre/' . $imageName;
            Storage::disk('s3')->put($filePath, $imageData, 'public');
            $sobre->foto = $imageName;
        } elseif (!$base64Image) {
            $sobre->foto = null;
        }

        $sobre->titulo = $request->titulo;
        $sobre->empresa_id = $id;
        $sobre->texto = $request->texto;
        $sobre->save();

        $status = $sobre->wasRecentlyCreated ? 201 : 200;

        return response()->json(["message" => "Sobre " . ($sobre->wasRecentlyCreated ? "cadastrado" : "editado") . " com sucesso"], $status);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
