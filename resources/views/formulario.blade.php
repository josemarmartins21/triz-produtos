@extends('layouts.layout-main')

@section('conteudo')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            {{-- erros --}}
            @if ($errors->any())
                <div class="alert alert-danger p-2 mb-3">
                    @foreach ($errors->all() as $erro)
                        <p style="padding: 0; margin: 0">{{ $erro }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('submissao') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="text_produto" class="form-label">Produto</label>
                    <input type="text" name="text_produto" id="text_produto" class="form-control" value="{{ old('text_produto', 'produto 1') }}">
                </div>
                <div class="mb-3">
                    <label for="text_marca" class="form-label">Marca</label>
                    <input type="text" name="text_marca" id="text_marca" class="form-control" value="{{ old('text_marca', 'produto 2') }}">
                </div>

                <div class="text-center">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    
</div>
@endsection