@extends('layout')
@section('title', 'Reservas')

@section('content')
@include('partials.session-status')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		
		 <h1 class="display-4 mb-0">Ventas</h1>				
			{{-- <aclass="btnbtn-primary"href="route('reservas.create') }}">Nuevo Registro</a>	--}}			
	</div>	
</div>

<div class="row">
	<div class="table table-responsive">
		<table class="table table-bordered " id="table">
			
				<tr>
					<th width="150px">No</th>
					<th >producto</th>
					<th >dueño id</th>
					<th >precio</th>
					<th >cantidad</th>
					<th >Acciones</th>
					<th class="text-center" width="150px">
						<a href="#" class="create-modal btn btn-success btn-sm">
							<i class="fas fa-cart-arrow-down"></i>
						</a>
					</th>
				</tr>
				@csrf
				<?php $no=1; ?>
				@foreach($ventas as $venta)
					<tr class="ventas{{ $venta->id }}">
					<td>{{ $no++ }}</td>
					<td>{{ $venta->productos_id }}</td>
					<td>{{ $venta->duenio_id }}</td>
					<td>{{ $venta->precio }}</td>
					<td>{{ $venta->cantidad }}</td>
					<td>
						<a href="#" class="show-modal btn btn-info btn-sm" data-productos_id="{{ $venta->productos_id }}" data-duenio_id="{{ $venta->duenio_id }}" data-precio="{{ $venta->precio }}" data-cantidad="{{ $venta->cantidad }}">
						<i class="fa fa-eye"></i>
						</a>
						<a href="#" class="edit-modal btn btn-warning btn-sm" data-productos_id="{{ $venta->productos_id }}" data-duenio_id="{{ $venta->duenio_id }}" data-precio="{{ $venta->precio }}" data-cantidad="{{ $venta->cantidad }}">
						<i class="fa fa-edit"></i></a>
						<a href="#" class="delete-modal btn btn-warning btn-sm" data-productos_id="{{ $venta->productos_id }}" data-duenio_id="{{ $venta->duenio_id }}" data-precio="{{ $venta->precio }}" data-cantidad="{{ $venta->cantidad }}">
							<i class="fa fa-trash-alt"></i></a>
					</td>
					</tr>
				@endforeach
		</table>
	</div>
</div>
			
<div id="create" class="modal fade" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"></h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form" action="POST">
				<div class="form-group">
					<label for="duenio_id">Dueño Id: </label>
					<input type="text" class="form-control" id="recipient-name">
					{{--<select class="form-control @error('duenio_id') is-invalid @else border-0 @enderror" id="duenio_id" name="duenio_id" >
						@foreach($duenios as $duenio)
							 <option value="{{ old('duenio_id',$duenio->id) }}"> {{ $duenio->id }}</option>
					 @endforeach
					</select>--}}
					<p class="error text-center alert alert-danger hidden"></p>
				  </div>
				  <div class="form-group">
					<label for="productos_id">Producto Id: </label>
					<input type="text" class="form-control" id="recipient-name">
					{{--<select class="form-control @error('productos_id') is-invalid @else border-0 @enderror" id="productos_id" name="productos_id" >
						@foreach($productos  as $producto)
							 <option value="{{ old('productos_id',$producto->id) }}"> {{ $producto->id }}</option>
					 @endforeach
					</select>--}}
				  </div>
				  <div class="form-group">
					<label for="precio">Precio: </label>
					<input type="text" class="form-control" id="recipient-name">
					{{--<select class="form-control @error('precio') is-invalid @else border-0 @enderror" id="precio" name="precio" >
						@foreach($productos  as $producto)
							 <option value="{{ old('precio',$producto->precio) }}"> {{ $producto->precio }}</option>
					 @endforeach
					</select>--}}
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Cantidad:</label>
					<input type="text" class="form-control" id="recipient-name">
				  </div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">
				<span class="glyphicon glyphicon-remobe">Cancelar</span></button>
			<button type="submit" class="btn btn-primary" id="add">
				 <span class="glyphicon glyphicon-plus">Comprar</span> </button>
		  </div>

	</div>
</div>
</div>




@endsection
