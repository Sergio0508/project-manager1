@extends('layout')
@section('title', 'Editar Formulario')
@section('content')
<div class="container">
	@include('partials.session-status')
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">

				<form class="bg-white py-3 px-4 shadow rounded" id="editform" method="POST" action="{{ route('duenios.update', $duenio) }}">
					 @method('PATCH')

					 <h1 class="display-4">Editar Registro</h1><hr>
					@include('duenios._form', ['btnText' => 'Actualizar'])
				</form>
			</div>
        </div>
    </div>
@endsection