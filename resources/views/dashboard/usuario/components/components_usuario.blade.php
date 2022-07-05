
        <div class="h1">
            <h1>@yield('titulo')</h1>
        </div>

        @if (isset($usuario->id))

        <form action="{{route('usuario.update',['usuario' => $usuario->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        @else
        <form action="{{route('usuario.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        @endif


            <div class="form">

                <div class="label">
                    <label for="">Nome: <input type="text" name="nome" value="{{ $usuario->nome ?? old('nome')}}" placeholder="Digite seu Nome" >
                        <div class="error" style="color: red;">
                            {{$errors->has('nome') ? $errors->first('nome') : ''}}
                        </div>
                    </label>

                    <label for="">Email: <input type="text" name="email" value="{{ $usuario->email ?? old('email')}}" placeholder="Digite seu Email">
                        <div class="error" style="color: red;">
                            {{$errors->has('email') ? $errors->first('email') : ''}}
                        </div>
                    </label>

                    <label for="">Senha: <input type="text" name="senha" value="{{old('senha')}}" placeholder="Digite sua Senha">
                        <div class="error" style="color: red;">
                            {{$errors->has('senha') ? $errors->first('senha') : ''}}
                        </div>
                    </label>
                    <label for="">Comfirme sua Senha: <input type="text" name="senha_confirmation" value="{{old('senha_confirmation')}}" placeholder="Digite sua Senha">
                        <div class="error" style="color: red;">
                            {{$errors->has('senha') ? $errors->first('senha') : ''}}
                        </div>
                    </label>

                </div>
                <div class="file">
                    <div class="usuario-foto">
                        @if (isset($usuario->id))
                         <img src="{{asset('storage/'.$usuario->usuarioFoto->foto_caminho)}}" alt="">
                        @else
                         <img src="{{asset('storage/foto_usuario/user.png')}}" alt="">
                        @endif

                    </div>
                    <label for=""><input type="file" name="imagem">
                        <div class="error" style="color: red;">
                            {{$errors->has('imagem') ? $errors->first('imagem') : ''}}
                        </div>
                    </label>

                    <label for="">

                            <select name="cargo" id="">
                                <option value="">Selecione um Cargo</option>

                                <option value="adm" {{ @$usuario->cargo == 'adm' ? 'selected' : ''}}>Adm</option>
                                <option value="funcionario" {{@ $usuario->cargo == 'funcionario' ? 'selected' : ''}}>Funcionario</option>

                            </select>


                        <div class="error" style="color: red;">
                            {{$errors->has('cargo') ? $errors->first('cargo') : ''}}
                        </div>
                    </label>

                    <label for="">

                            <select name="status" id="">
                                <option value="">Selecione um Status</option>

                                <option value="ativo"{{@$usuario->status == 'ativo' ? 'selected' : ''}}>Ativo</option>
                                <option value="desativado"{{@$usuario->status == 'desativado' ? 'selected' : ''}}>Desativado</option>

                            </select>


                        <div class="error" style="color: red;">
                            {{$errors->has('status') ? $errors->first('status') : ''}}
                        </div>
                    </label>


                </div>

            </div>

            <div class="input-form">
                <input type="submit" value="Cadastrar">
            </div>
        </form>

