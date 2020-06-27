@extends('layout')
@section('title', 'Productos')

@section('content')
<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-3">

	         {{--<h1 class="display-4 mb-0">Dueños</h1>
				<a class="btn btn-primary" href="{{ route('productos.create') }}">Nuevo Registro</a>--}}
        </div>
	</div>
@include('partials.session-status')
<div class="row">
				@foreach($productos as $producto)

				<div class="col-lg">
					<div class="card " style="width:18rem;">
						<img class="card-img-top" src="{{asset('storage').'/'.$producto->foto}}" alt="image">

						<div class="card-body">
							<h5 class="card-title"> {{ $producto->name }}</h5>
							<hr>
							<p class="card-text"> {{$producto->precio}} Bs.</p>
							<a href="# " class="btn btn-primary btn-sm"> Comprar</a>
							
							<a class="btn btn-primary" href="{{ route('productos.create') }}"> <i class="fas fa-user-plus"></i> </a>
							@if(Auth::user()->hasRole('admin'))
								<a class="btn btn-warning btn-md" href="{{ url('productos/'.$producto->id.'edit') }}"> <i class="fa fa-eye"></i> </a>
								<form method="POST" action="{{ url('productos/'.$producto->id) }}"  style="display:inline;">
									@csrf @method('DELETE')
									<button class="btn btn-danger btn-md" type="submit" onclick="return confirm('Esta seguro de Borrar?')"> Borrar</button>
                            @endif
						</div>
					</div>
				</div>

			@endforeach
		</div>
@endsection
