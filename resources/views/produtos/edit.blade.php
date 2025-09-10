@extends('layouts.main')


@section('title', 'Triz - Editar ' . $produto->nome)

@section('content')
       <section id="create">
        <h2>Atualizar - {{ $produto->nome }}</h2>
        <form action="/produto/{{ $produto->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto*"  autocomplete="off" maxlength="30" value="{{ $produto->nome }}">
            </div>

            <div class="form-group">
                <input type="number" name="preco" id="preco" min="50" placeholder="Digite o preço do produto*" value="{{ $produto->preco }}">
            </div>

            <div class="form-group">
                <textarea name="descricao" id="sobre" cols="50" rows="10" placeholder="Descrição do produto" minlength="200" >{{ $produto->descricao }}</textarea>
            </div>
            <div class="form-group">
                <img src="/img/uploads/{{ $produto->imagem }}" alt="{{ $produto->nome }}" width="120px">
            </div>
            <div class="form-group">
                <input type="file" name="imagem" id="imagem" value="{{ $produto->imagem }}">
            </div>
            <div class="form-group">
                <input type="file" name="imagem_2" id="imagem" {{ $produto?->imagem_2 }}>
                
            </div>
            
            <input type="submit" value="Enviar">
        </form>
             <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif
   
        </div>
    </section>
@endsection