@extends('layout')
@section('title', 'Dueño')

@section('content')
 <div class="container">
    <div class="bg-white p-5 shadow rounded">

        <h1>Nombre Propietario: {{ $duenio->name }}</h1>
        <hr>

        <p class="text-secondary">Apellido: {{ $duenio->lastname }}</p>
        <p class="text-secondary">Ci: {{ $duenio->ci}}</p>
        <p class="text-secondary">Direccion: {{ $duenio->address}}</p>
        <p class="text-secondary">Telefono: {{ $duenio->phone}}</p>
        <p class="text-secondary">Email: {{ $duenio->email}}</p>
        <p class="text-secondary">Genero: {{ $duenio->genero}}</p>

         <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-primary" href="{{ route('duenios.index') }}"> Regresar </a>
             <div class="btn-group btn-group-sm">
                  <a class="btn btn-primary btnEdit" href="{{ route('duenios.edit', $duenio) }}">Editar</a>
             </div>
         </div>
   </div>
</div>
{{--


        @auth
              <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()">Eliminar</a>
             </div>
                <form class="d-none" id="delete-project" method="POST" action="{{ route('productos.destroy', $producto) }}">
                	@csrf @method('DELETE')
                </form>
            @endauth
        </div>

   --}}
@endsection