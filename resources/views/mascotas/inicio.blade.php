@extends('layout.default')
@section('css')
    <style>
        a, a:hover {
            color: white;
        }
    </style>
@endsection
@section('title', $title)
@section('content')
    <div class="container">
        <div class="float-right">
            <a href="{{ route('Mascota.nuevo') }}" class="btn btn-primary">Nueva mascota</a>
        </div>
        <h1 style="font-size: 2.2rem">Mascotas</h1>
        <hr/>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>Color</th>
                        <th>Raza</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td scope="row">{{ $mascota->id }}</td>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->peso }}</td>
                            <td>{{ $mascota->altura }}</td>
                            <td>{{ $mascota->color }}</td>
                            <td>{{ ucwords($mascota->Raza->raza) }}</td>
                            <td> <a href="{{ route('Mascota.editar', ['id' => $mascota->id]) }}" class="btn btn-primary"><span class="oi oi-pencil"></span></a> <button onclick="deleteData({{ $mascota->id }})" type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button> </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
         <nav>
            <ul class="pagination justify-content-end">
                {{ $mascotas->links() }}
            </ul>
        </nav>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.3/dist/sweetalert2.all.min.js"></script>
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteData(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "El cambio no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrarlo!'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: "{{ url('Mascotas/Borrar') }}" + '/' + id,
                            type: "POST",
                            data: {
                                    '_method' : 'DELETE',
                                    id : id
                                },
                            success: function(){
                                Swal.fire(
                                    'Borrado!',
                                    'Registro eliminado.',
                                    'Exito'
                                )
                                window.location.replace("{{ route('Mascota.inicio') }}");
                            }
                        });
                }
                });
        }

        </script>
@endsection
