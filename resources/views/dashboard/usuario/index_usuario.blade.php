@extends('dashboard.layout.index_layout')


{{-- @section('css') aqui eu pego o css do meu controller  e passo para meu header la em  @yield('css') --}}
@section('css')
{!! $css !!}
{!! $responsivel !!}
@stop

{{-- aqui passo meu titulo --}}
@section('titulo', 'Usuario')

@section('listaUsuario')

<div class="box">
    <div class="box-tamanho">
        <div class="box-tabela">
            <div class="h1">
                <h1>Lista Usuarios</h1>
            </div>
            {{-- {{ dd($usuario)}} --}}
            <div class="novo_usuario">
             <label for=""><a href="{{route('usuario.create')}}"><i class="ik ik-plus"></i> novo usuario</a> </label>
            </div>
            <div class="tabela">

                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuario as $usuarios)
                        <tr>
                            <td><img src="{{asset('storage/'.$usuarios->usuarioFoto->foto_caminho)}}" alt=""></td>
                            <td>{{$usuarios->nome}}</td>
                            <td>{{$usuarios->email}}</td>
                            <td>{{$usuarios->cargo}}</td>
                            <td>{!! ($usuarios->status == 'ativo' ? '<span class="badge badge-pill badge-success mb-1"><i class="fas fa-lock-open"></i>&nbsp;Sim</span>' : '<span class="badge badge-pill badge-danger mb-1"><i class="fas fa-lock"></i>&nbsp;Não</span>') !!}</td>

                            <td>
                                <a href="{{route('usuario.edit',['usuario' => $usuarios->id])}}"><i class="ik ik-edit" style="color: blue;"></i></a>

                                <button  onclick="deletar('{{$usuarios->id}}')"> <i class="ik ik-trash-2" style="color: red;"></i> </button>

                            </td>
                         </tr>

                            {{-- inicio modal  --}}
                                <div class="modal-tradicional" id="abrirmodal{{$usuarios->id}}">
                                    <div class="abrimodal">
                                        <div class="abrimodal-h1">
                                            <h1>DELETAR USUARIO</h1> <p onclick="fechar1({{$usuarios->id}})">X</p>
                                        </div>

                                        <div class="abrimodal-texto">
                                            <p>Deseja mesmo apagar esse Usúario ? {{$usuarios->nome}}</p>
                                        </div>
                                        <div class="abrimodal-button">
                                            <input type="submit" onclick="fechar2({{$usuarios->id}})" class="cancelar" value="Cancelar">

                                            <form action="{{route('usuario.destroy',['usuario' => $usuarios->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="deletar" value="Deletar">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            {{-- fim modal    --}}

                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>

        <div class="tabela-navegar">
            <div class="navegar">
                {{-- o appends espera um array para guarda os dado do pagination ai os dados nao se perde --}}
                {{$usuario->appends($request)->links('vendor.pagination.bootstrap-4')}} {{-- la no controle tenho que passar or request->all() aqui vira as seta para navegar--}}
             </div>
            {{--
            {{$fornecedores->count()}} - total de registro por pagina
            <br>
            {{$fornecedores->total()}} - total de registro da consulta
            <br>
            {{$fornecedores->firstItem()}} - Número do primeiro registro da pagina
            <br>
            {{$fornecedores->lastItem()}} - Número do ultimo registro da pagina --}}
            <div class="navegar-texto">
                <h3>
                    Exibindo {{$usuario->count()}} usuarios {{$usuario->total()}} (de {{$usuario->firstItem()}} a {{$usuario->lastItem()}} )
                </h3>
            </div>
        </div>

    </div>

</div>

{{-- script modal  --}}
<script>
    function deletar(id){

        var id1 = id;
        // alert(id1);
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'flex';
    }
    function fechar1(id){
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'none';
    }

    function fechar2(id){
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'none';
    }
</script>

{{-- fim script modal  --}}

@endsection




