<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioFoto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd('oi');
        $request = $request->all();
        $url = url('');
        $css = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/index_usuario.css">';
        $responsivel = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/responsivel_usuario.css">';
        // dd($css);

        $usuario = Usuario::paginate(3);


        return view('dashboard.usuario.index_usuario', compact('css','responsivel', 'usuario','request'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $url = url('');
        $responsivel = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/responsivel_usuario.css">';
        $css = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/form_usuario.css">';

        // dd($cargo);


        return view('dashboard.usuario.form_usuario', compact('css','responsivel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:4',
            'email' => 'email|required|min:4|unique:usuarios',
            'senha' => 'required|min:4|max:10|confirmed',
            'cargo' => 'required',
            'status' => 'required',
            'imagem' => 'required|file|mimes:png,jpg'

        ];

        $feedback = [
            'required' => 'O campo :attribute precisar ser prenchido',
            'min' => 'O campo :attribute deve ter no minimo: 3 Caracter',
            'senha.max' => 'O campo deve ter no maximo: 10 Caracter',
            'senha.confirmed' => 'Sua senha não são Indenticas',
            'nome.unique' => 'Este Nome ja Existe',
            'email.unique' => 'Este Email ja Existe',
            'email' => 'Digite um E-mail valido',
            'imagem.mimes' => 'o formato do arquivo deve ser PNG ou JPG'
        ];

        $request->validate($regras, $feedback);

        $imagem = $request->file('imagem');
        //  o metodo store tem 2 paramentro o 1 e o path = caminho que vai ser armazenado.
        //  o 2 paramentro e chamado de disco onde vamos armazena e nos configura isso em config no arquivo filesystems.
        $imagem_urn = $imagem->store('foto_usuario', 'public');

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,
            'cargo' => $request->cargo,
            'status' => $request->status
        ]);

        $usuarioFoto = UsuarioFoto::create([
            'usuario_id' => $usuario->id,
            'foto_caminho' => $imagem_urn
        ]);

    return redirect()->route('usuario.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
        // dd($usuario->usuarioFoto->foto_caminho);

        $url = url('');
        $responsivel = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/responsivel_usuario.css">';
        $css = '<link rel="stylesheet" href="'.$url.'/dashboard/css/usuario/form_usuario.css">';

        return view('dashboard.usuario.index_edit', compact('usuario', 'css', 'responsivel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //

        $id = $usuario->id;

        if($request->senha){

            $regras = [
                'nome' => 'min:4',
                'email' => 'email|unique:usuarios,email,'.$id,
                'senha' => 'min:4|max:10|confirmed',
                'cargo' => 'required',
                'status' => 'required',
                'imagem' => 'file|mimes:png,jpg'
            ];

        }else{

            $regras = [
                'nome' => 'min:4',
                'email' => 'email|unique:usuarios,email,'.$id,
                'cargo' => 'required',
                'status' => 'required',
                'imagem' => 'file|mimes:png,jpg'

            ];

        }


            $feedback = [
                'required' => 'O campo :attribute precisar ser prenchido',
                'min' => 'O campo :attribute deve ter no minimo: 3 Caracter',
                'senha.max' => 'O campo deve ter no maximo: 10 Caracter',
                'senha.confirmed' => 'Sua senha não são Indenticas',
                'nome.unique' => 'Este Nome ja Existe',
                'email' => 'Digite um E-mail valido',
                'imagem.mimes' => 'o formato do arquivo deve ser PNG ou JPG'
            ];

            $request->validate($regras, $feedback);

            $imagem_urn = null;

            if($request->file('imagem') != null){

                $imagem = $request->file('imagem');
                //  o metodo store tem 2 paramentro o 1 e o path = caminho que vai ser armazenado.
                //  o 2 paramentro e chamado de disco onde vamos armazena e nos configura isso em config no arquivo filesystems.
                $imagem_urn = $imagem->store('foto_usuario', 'public');

                if($imagem_urn != $usuario->usuarioFoto->foto_caminho){
                    //remover o arquivo caso um novo arquivo tenha sido enviado no request
                    Storage::disk('public')->delete($usuario->usuarioFoto->foto_caminho);// aqui estou removendo a imagem do meu disco

                }

            }

            $usuario->update([
                'nome' => ($request->nome) ? $request->nome : $usuario->nome,
                'email' => ($request->email) ? $request->email : $usuario->email,
                'senha' => ($request->senha) ? $request->senha : $usuario->senha,
                'cargo' => ($request->cargo) ? $request->cargo : $usuario->cargo,
                'status' => ($request->status) ? $request->status : $usuario->status
            ]);

            $usuario->usuarioFoto->update([
                'usuario_id' => $usuario->id,
                'foto_caminho' => ($imagem_urn) ? $imagem_urn : $usuario->usuarioFoto->foto_caminho
            ]);


        return redirect()->route('usuario.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //

        $usuario->delete();//esse delete deletamos ele logicamente mas ele fica no banco na funcao deleted_at
        //$usuario->forceDelete();//eu deleto do banco . o outro delete so deleta logicamente pq passarmos uma funcao para ele fica deletado no deleted_at

        return redirect()->route('usuario.index');

    }
}
