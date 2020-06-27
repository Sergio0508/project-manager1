@extends('layout')
@section('title', 'Productos')

@section('content')
 <div class="container">
    <div class="bg-white p-5 shadow rounded">

        <h1>Producto: {{ $productos->name }}</h1>
        <hr>

        <p class="text-secondary">Precio: {{ $productos->precio }}</p>
        <p class="text-secondary">Tipo: {{ $productos->tipo}}</p>
        <p class="text-secondary">Stock: {{ $productos->stock}}</p>
        <img style="height: 150px; width:150px; " class="card-img-top" src="{{asset('storage').'/'.$productos->foto}}" alt="image">

         <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar </a>
             <div class="btn-group btn-group-sm">
                  <a class="btn btn-primary" href="{{ route('productos.edit', $productos) }}">Editar</a>
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