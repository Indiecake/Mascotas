@extends('layout.default')
@section('css')
    <style>
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('title', $title)
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($raza)?'Editar':'Nueva'}} Raza</h1>
            <hr/>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('Raza.guardar') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $raza->id ?? '0' }}" name="id">

                <div class="form-group">
                        <label for="nombre">Nombre de la raza</label>
                        <input class="form-control" name="raza" type="text" value="{{ $raza->raza ?? ''}}" placeholder="E.j. Caballo, Loro, etc." id="nombre">
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <a href="{{ route('Raza.inicio')}}" class="btn btn-danger">Regresar</a>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
