@extends('layout')
@section('title', 'Crear Registro')
@section('content')
<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">
				<form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
					@include('partials.session-status')
					<h1 class="display-4">Nuevo Registro</h1><hr>
					@include('productos._form', ['btnText' => 'Guardar'])

				</form>
			</div>
		</div>
</div>
@endsection