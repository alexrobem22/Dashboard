<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class LoginController extends Controller
{
    //
    public function index(Request $request){

        $erro = '';

        if($request->erro == 1){

            // $erro = 'Usuario ou Senha não existe';
            $erro = 1;

        } if($request->erro == 2){

            // $erro = 'Necessário realizar login para ter acesso a pagina';
            $erro = 2;
        }

        return view('dashboard.login',compact('erro'));
    }

    public function autenticar(Request $request){

        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.email' => 'O campo E-mail e obrigatorio',
            'senha.required' => 'O campo Senha e obrigatorio'
        ];

        $email = $request->email;
        $senha = $request->senha;

        $request->validate($regras, $feedback);

        //o metodo first() = pega o primeiro da lista
        $usuario = Usuario::where('email', $email)->where('senha', $senha)->where('cargo', 'adm')->where('status', 'ativo')->get()->first();

        if($usuario == true){

            //depois da validacao do usuario eu passo os dados para session_start()
            //la no middleware eu pego a session e faço as validadoes para entra na rota
       session_start();
       $_SESSION['id'] = $usuario->id;
       $_SESSION['nome'] = $usuario->nome;
       $_SESSION['email'] = $usuario->email;
       $_SESSION['cargo'] = $usuario->cargo;



    //    return redirect()->route('dashboard.index');
       return redirect()->route('usuario.index');

        }
        else{

            return redirect()->route('login',['erro' => 1]);

        }

    }

    public function sair(){

        session_destroy();

        return redirect()->route('login');
    }

}
