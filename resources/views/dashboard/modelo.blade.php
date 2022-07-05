@extends('site.templates.header')

{{-- essa funcao passo no crontroller para eu receber o css na viu --}}
{{-- $url = url('');
$css = '<link rel="stylesheet" href="'.$url.'/site/css/sobrefricon.css">'; --}}

{{-- @section('css') aqui eu pego o css do meu controller  e passo para meu header la em  @yield('css') --}}
    {!! $css !!}
@stop

{{-- aqui passo meu titulo --}}
@section('titulo', 'Assistência técnica')


@section('assistenciatecnica')

{{-- aqui entra as div meu conteudo --}}

@endsection

