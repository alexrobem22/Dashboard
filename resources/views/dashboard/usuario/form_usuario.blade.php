@extends('dashboard.layout.index_layout')


{{-- @section('css') aqui eu pego o css do meu controller  e passo para meu header la em  @yield('css') --}}
@section('css')
    {!! $css !!}
    {!! $responsivel !!}

@stop

{{-- aqui passo meu titulo --}}
@section('titulo', 'Adicionar Usuario')


@section('CreateUsuario')

<div class="box-form">
    <div class="box-form-tamanho">

    @component('dashboard.usuario.components.components_usuario')

    @endcomponent

    </div>
</div>
@endsection
