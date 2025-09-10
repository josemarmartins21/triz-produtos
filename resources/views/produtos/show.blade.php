@extends('layouts.main')

@section('title', $produto->nome)

@section('content')
<section id="show">
    <p>Publicado em: <strong>{{ $produto->created_at->format('d/m/Y') }}</strong> </p>

    <div class="img">
        <img src="/img/uploads/{{ $produto->imagem }}" alt="{{ $produto->nome }}">
        
    </div>


    
    <div id="descricao">
        <h2> {{ ucwords($produto->nome) }} </h2>

        <p>{{ $produto->descricao }}</p>
    </div>

    <div class="optional-img">
        @if ($produto->imagem_2)
            <img src="/img/uploads/{{ $produto->imagem_2 }}" alt="{{ $produto->nome }}">
            
        @endif
    </div>
</section>
@endsection