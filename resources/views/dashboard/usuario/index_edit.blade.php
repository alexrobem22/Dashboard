@extends('dashboard.layout.index_layout')


{{-- @section('css') aqui eu pego o css do meu controller  e passo para meu header la em  @yield('css') --}}
@section('css')
    {!! $css !!}
    {!! $responsivel !!}

@stop

{{-- aqui passo meu titulo --}}
@section('titulo', 'Editar Usuario')


@section('EditarUsuario')

<div class="box-form">
    <div class="box-form-tamanho">

    @component('dashboard.usuario.components.components_usuario',['usuario' => $usuario])

    @endcomponent

    </div>
</div>
@endsection
