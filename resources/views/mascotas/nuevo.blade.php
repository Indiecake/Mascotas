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
            <h1>{{isset($mascota)?'Editar':'Nueva'}} Mascota</h1>
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

            <form method="POST" action="{{ route('Mascota.guardar') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{ $mascota->id ?? '0' }}" name="id">
            <div class="form-group">
                    <label for="nombre">Nombre de la mascota</label>
                    <input class="form-control" name="nombre" type="text" value="{{ $mascota->nombre ?? ''}}" placeholder="E.j. Fisifuz" id="nombre">
            </div>

            <div class="form-group">
                    <label for="peso">Peso en kilos</label>
                    <input class="form-control" type="text" value="{{ $mascota->peso ?? '' }}" placeholder="0.0 Kg" name="peso">
            </div>

            <div class="form-group">
                    <label for="altura">Altura</label>
                    <input class="form-control" type="text" value="{{ $mascota->altura ?? '' }}" placeholder="0.0 Cm" name="altura">
            </div>

            <div class="form-group">
                    <label for="color">Color</label>
                    <input class="form-control" type="text" value="{{ $mascota->color ?? '' }}" placeholder="E.j. Naranja, Cafe, etc." name="color">
            </div>

            <div class="form-group">
                    <label for="raza">Raza</label>
                    <select name="raza" class="form-control" id="raza">
                        <option value="">Seleciona una raza</option>
                        @foreach ($razas as $raza)

                            @if (isset($mascota->raza_id))
                                @if ( $mascota->raza_id == $raza->id )
                                    <option value="{{ $raza->id }}" selected>{{ $raza->raza }}</option>
                                @endif

                            @endif
                            <option value="{{ $raza->id }}">{{ $raza->raza }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group row required">

             </div>

            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <a href="{{ route('Mascota.inicio')}}" class="btn btn-danger">Regresar</a>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
