<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ComentarioBlog;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null, Request $request)
     {
         $query = Blog::query();
 
         if ($request->has('name')) {
             $query->where('titulo', 'like', '%' . $request->input('name') . '%');
         }
 
         if ($id) {
             $query->where('empresa_id', $id);
         }
 
         $blogs = $query->paginate(15);
 
         // Obter a URL da imagem para cada automóvel
         foreach ($blogs as $blog) {
            if($blog->foto != ""){
                $blog->foto = Storage::disk('s3')->url("blog/".$blog->foto);
            }
         }
 
         return BlogResource::collection($blogs);
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

            $base64Image = $request->input('foto');
            list($type, $base64Image) = explode(';', $base64Image);
            list(, $base64Image) = explode(',', $base64Image);
            $imageData = base64_decode($base64Image);
            $imageName = 'image_' . time() . '.png';
            $filePath = 'blog/' . $imageName;
            
            Storage::disk('s3')->put($filePath, $imageData, 'public');

            $blog = new Blog();
            $blog->foto = $imageName;
            $blog->titulo = $request->titulo;
            $blog->subtitulo = $request->subtitulo;
            $blog->texto = $request->texto;
            $blog->empresa_id = $request->empresa_id;
            $blog->save();


        DB::commit();
        return response()->json(["message" => "Blog cadastrado com sucesso"], 201);

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

        $query = Blog::query();
        $blog = $query->find($id);

        $blog->foto = Storage::disk('s3')->url("blog/".$blog->foto);


        if (!$blog) {
            return response()->json(["message" => "blog não encontrada"], 404);
        }

        return BlogResource::make($blog);
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
            
            $blog = Blog::find($id);

            if (!$blog) {
                return response()->json(["message" => "blog não encontrada"], 404);
            }

            $base64Image = $request->input('foto');
            if ($base64Image !== null) {
            
                if (!Str::contains($base64Image, 'https')) {
                    list($type, $base64Image) = explode(';', $base64Image);
                    list(, $base64Image) = explode(',', $base64Image);
                    $imageData = base64_decode($base64Image);
                    $imageName = 'image_' . time() . '.png';
                    $filePath = 'blog/' . $imageName;
                    Storage::disk('s3')->put($filePath, $imageData, 'public');
                    $blog->foto = $imageName;
                } 
            } else {
                $blog->foto = null;
            }

            $blog->titulo = $request->titulo;
            $blog->subtitulo = $request->subtitulo;
            $blog->texto = $request->texto;
            $blog->empresa_id = $request->empresa_id;
            $blog->update();

            
            DB::commit();
            return response()->json(["message" => "blog editada com sucesso"], 200);

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
        $blog = Blog::find($id);
    
        if (!$blog) {
            return response()->json(["message" => "blog não encontrado"], 404);
        }
    
        $blog->delete();
    
        return response()->json(["message" => "blog excluído com sucesso"], 200);
    }

    public function storeComentario(Request $request){

        $comentario = new ComentarioBlog();
        $comentario->blog_id = $request->blog_id;
        $comentario->nome_usuario = $request->nome_usuario;
        $comentario->comentario = $request->comentario;
        $comentario->save();

        return response()->json(["message" => "Comentario Criado com sucesso"], 200);

    }
}
