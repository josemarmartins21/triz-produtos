@extends('layouts.main')


@section('title', 'Cadastrar produtos')

@section('content')
    <section id="create">
        <h2>Adicione um novo produto</h2>
        <form action="{{ route('produtos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto*"  autocomplete="off" maxlength="30">
            </div>

            <div class="form-group">
                <input type="number" name="preco" id="preco" min="50" placeholder="Digite o preço do produto*" >
            </div>

            <div class="form-group">
                <textarea name="descricao" id="descricao" cols="50" rows="10" placeholder="Descrição do produto"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="imagem" id="imagem" accept=".jpg" >
            </div>
            <input type="submit" value="Enviar">
        </form>
    </section>
@endsection