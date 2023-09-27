<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Helpers\ApiHelper;

class BlogController extends Controller
{
    public function index(Request $request){

        $data = ApiHelper::getDataFromApi($request->search);
        $dataObj = json_decode($data);

        $blogs = $dataObj->data->blogs;
        $blogsFiltrados = collect($blogs);

        $perPage = 10;

        $total = $blogsFiltrados->count();

        $blog = new LengthAwarePaginator(
            $blogsFiltrados->forPage(request()->input('page'), $perPage),
            $total,
            $perPage,
            request()->input('page'),
            ['path' => request()->url()]
        );

        $blogsRecentes = collect($blogs)->sortByDesc('created_at')->take(3);

        $titulo = "Blogs - " . $dataObj->data->nome;

        return view('blog.lista.index', compact(
            'blog',
            'blogsRecentes',
            'titulo'
        ));
    }

    public function show($id){

        $data = ApiHelper::getDataFromApi();
        $dataObj = json_decode($data);

        $blogs = $dataObj->data->blogs;

        $item = collect($blogs)->where('id', $id)->first();

        $idAnterior = $id - 1;
        $postAnt = collect($blogs)->where('id', $idAnterior)->first();

        $postPoste = collect($blogs)->where('id', $id + 1)->first();

        $blogsRecentes = collect($blogs)->sortByDesc('created_at')->take(3);

        $site = $dataObj->data;

        $titulo = $item->titulo;

        return view('blog.detalhes.index', compact('item', 'blogsRecentes', 'site', 'titulo', 'postAnt', 'postPoste'));
    }

    public function enviarComentario(Request $request){
        
        $data = [
            'blog_id' => $request->input('blog_id'),
            'nome_usuario' => $request->input('nome_usuario'),
            'comentario' => $request->input('comentario'),
        ];

        $response = ApiHelper::postComentario($data);
        
        return back()->with('success','Comentário feito com sucesso!!');
    }
}
