<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UsuarioResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mockery\Undefined;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null, Request $request)
    {
        $query = User::query();
    
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        if ($id) {
            $query->where('empresa_id', $id);
        }
    
        $users = $query->paginate(15);
    
        return UsuarioResource::collection($users);
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'empresa_id' => 'required',
            'foto' => ''
        ]);

        $base64Image = $request->input('foto');

        if ($base64Image !== null) {
            list($type, $base64Image) = explode(';', $base64Image);
            list(, $base64Image) = explode(',', $base64Image);
            $imageData = base64_decode($base64Image);
            $imageName = 'image_' . time() . '.png';
            $filePath = 'usuarios/' . $imageName;
            Storage::disk('s3')->put($filePath, $imageData, 'public');
            $data['foto'] = $imageName;
            
        } else {
            $data['foto'] = null;
        }

        $data['password'] = Hash::make($request->password);

        User::create($data); 

        return response()->json(["message" => "Usuario cadastrado com sucesso"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        $usuario->foto = Storage::disk('s3')->url("usuarios/".$usuario->foto);

        if (!$usuario) {
            return response()->json(["message" => "Usuario não encontrado"], 404);
        }

        return UsuarioResource::make($usuario);
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
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(["message" => "usuário não encontrado"], 404);
        } 


        $base64Image = $request->input('foto');

        if ($base64Image !== null) {
            
            if (!Str::contains($base64Image, 'https')) {
                list($type, $base64Image) = explode(';', $base64Image);
                list(, $base64Image) = explode(',', $base64Image);
                $imageData = base64_decode($base64Image);
                $imageName = 'image_' . time() . '.png';
                $filePath = 'usuarios/' . $imageName;
                Storage::disk('s3')->put($filePath, $imageData, 'public');
                $usuario->foto = $imageName;
            } 
        } else {
            $usuario->foto = null;
        }
        

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        // $usuario->password = $request->password;
        $usuario->save();

        return response()->json(["message" => "usuário editado com sucesso"], 200);
    }

    public function updatePassword(Request $request, string $id){

        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(["message" => "usuário não encontrado"], 404);
        } 
        if (Hash::check($request->currentPassword, $usuario->password)) {

            if($request->newPassword == $request->confirmPassword){

                $usuario['password'] = Hash::make($request->newPassword);
                $usuario->update();

                return response()->json(["message" => "Senha Alterada cm sucesso"], 201);
            }
            else{
                return response()->json(["message" => "A nova senha não corresponde a sua confirmação!"], 401);
            }
        } else {

            return response()->json(["message" => "A atual senha não corresponde a esta!"], 401);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
    
        if (!$usuario) {
            return response()->json(["message" => "usuario não encontrado"], 404);
        }
    
        $usuario->delete();
    
        return response()->json(["message" => "usuario excluído com sucesso"], 200);
    }

    public function Login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('JWT');
            return response()->json([
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        return response()->json('Usuario não autenticado', 401);
    }
}
