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
            <form action="{{ route('upload_submissao') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <input type="file" name="ficheiro" id="" class="form-control">
                </div>

                <div class="text-center">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    
</div>
@endsection