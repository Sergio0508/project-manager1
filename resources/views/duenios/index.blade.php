@extends('layout')
@section('title', 'Dueños')

@section('content')
@include('partials.session-status')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-3">

			 <h1 class="display-4 mb-0">Dueños</h1>
			 <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('duenios.search')}}" autocomplete="off">
				<input class="form-control mr-sm-2" type="text" name="name" aria-label="Search">
					<button class="btn btn-primary my-2 my-sm-0" type="submit"> <i class="fa fa-search"></i> Buscar</button>
			</form>			
				<a class="btn btn-primary" href="{{ route('duenios.create') }}">Nuevo Registro</a>
        </div>
	</div>
	@if(Auth::user()->hasRole('admin'))
							
	<ul>
		<li class="list-group-item border-0 mb-3 shadow-sm">
			<table class="table table-striped ">
				<thead >
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Telefono</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>

				<tbody>
						@forelse($duenios as $duenio)
						<a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('duenios.show', $duenio) }}">
					<tr>
							<td > {{ $duenio->name }} {{ $duenio->lastname }} </td>
							<td> {{ $duenio->phone }} </td>
							<td> 
							
							<a class="btn btn-warning btn-sm" href="{{ url('duenios/'.$duenio->id.'edit') }}"> Editar </a>|
								<form method="POST" action="{{ url('duenios/'.$duenio->id) }}"  style="display:inline;">
									@csrf @method('DELETE')
									<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Esta seguro de Borrar el registro?')">Borar</button>
							</td>
							
					</tr></a>
						@empty
			                <li>No existen Dueños Registrados</li>
		                @endforelse
				</tbody>
			</table>


			</li>


	</ul>@endif

@endsection
