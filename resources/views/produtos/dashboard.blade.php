@extends('layouts.main')


@section('title', 'Triz - Cadastrar produto')

@section('content')
@if (session('msg'))
    <p id="msg"> {{session('msg')}} </p>
   
@endif
<section id="dashboard">

    <div id="tabela">
        @if (count($produtos) <= 0)
            <h2>Nenhum produto adicionado <a href="/produtos/create">Clique aqui para adicionar</a><h2>

        @else
        <table>
            <caption>Produtos</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td> {{ $loop->index  + 1}} </td>
                    <td> <a href="/produtos/{{ $produto->id }}">{{ ucwords($produto->nome) }}</a> </td>
                    <td> {{ $produto->preco }} </td>
                    <td class="acoes">
                        <a href="/produtos/{{ $produto->id }}/edit" class="atualizar"><i class="fa-solid fa-pen-to-square"></i></a> 

                    <form action="/produtos/{{ $produto->id }}" method="POST">
                        @method("Delete")
                        @csrf

                        <button type="submit" class="apagar"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    </td>
                </tr>  
                @endforeach   
            </tbody>
            <tfoot >
                <tr>
                    <th colspan="3">Total de produtos</th>
                    <td> {{ $total_de_produtos }} </td>
                </tr>
            </tfoot>
        </table>
        @endif
    </div>
</section>

@endsection