@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section id="home">
        <div id="hero">
            <div id="preta">
                <h1>Busque por um produto</h1>    
                <form action="{{ route('produtos.index') }}" method="get">

                    <div class="form-group">
                        <input type="text" name="search" id="search" placeholder="Busque por um produto" required>
                    </div>
                </form>
            </div>
        </div>  
        
        <div id="produtos">
            @if (count($produtos) == 0 && $busca)
                <div id="container">
                    <h1>Nenhum resultado para: {{ $busca }}<h1>
                </div> 

            @elseif (count($produtos) == 0)      
                <div id="container">
                    <h1>Nada adicionado ainda <a href="{{ route('produtos.create') }}">Adicone um produto</a></h1>
                </div>

            @else
                <h2>Produtos</h2>
                <div id="container">
                    @foreach ($produtos as $produto)
                            <div class="card">
                                <img src="/img/uploads/{{ $produto->imagem }}" alt="{{ $produto->nome }}">
                                <div class="details">
                                    <h1>{{ ucwords($produto->nome) }}</h1>
                                    <p>
                                {{--     {{$produto->descricao}} --}}
                                    </p>
                                    <span> <div>{{ number_format($produto->preco, 2, ',', '.') }} Kz</div>
                                        <a href="/produtos/{{ $produto->id }}">Ver mais</a>  
                                    </span>
                                </div>
                            </div>

                    @endforeach
                </div> 

            @endif
        </div>
    </section>        
@endsection