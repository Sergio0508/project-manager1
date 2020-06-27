@csrf
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#duenioadd">
  Registrate Aqui
</button>
<a class="btn btn-primary btn-md btn-inline" href="{{ route('duenios.index') }}"> Cancelar </a>
<!-- Modal -->
<div class="modal fade" id="duenioadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"           aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro De Dueño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{{ csrf_field() }}
	      	<div class="form-group">
				<label for="ci"> Ci: </label>
				<input class="form-control bg-light shadow-sm @error('ci') is-invalid @else border-0 @enderror" id="ci" name="ci" placeholder="Celula de Identidad ..." value="{{ old('ci', $duenio->ci) }}">
	       </div>

		 <div class="row">
			<div class="col">
				<label for="name"> Nombre </label>
				<input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" id="name" name="name" placeholder="Nombre ..." value="{{ old('name', $duenio->name) }}">

			</div>
			<div class="col">
				<label for="lastname"> Apellido </label>
				<input class="form-control bg-light shadow-sm @error('lastname') is-invalid @else border-0 @enderror" id="lastname" name="lastname" placeholder="Apellido ..." value="{{ old('lastname', $duenio->lastname) }}">
			</div>
		 </div>
		 <div class="row">
			<div class="col">
				<label for="address"> Direccion </label>
				<input class="form-control bg-light shadow-sm @error('address') is-invalid @else border-0 @enderror" id="address" name="address" placeholder="Direccion ..." value="{{ old('address', $duenio->address) }}">	</div>
			<div class="col">
				<label for="phone"> Telefono </label>
				<input class="form-control bg-light shadow-sm @error('phone') is-invalid @else border-0 @enderror" id="phone" name="phone" placeholder="70707070" value="{{ old('phone', $duenio->phone) }}">
			</div>
		 </div>
		 <div class="form-group">
			<label for="email"> Correo: </label>
			<input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" name="email" placeholder="ejemplo@example.com" value="{{ old('email', $duenio->email) }}">
		 </div>

		 <div class="form-group">
			<label for="genero">Genero: </label>
			<select class="form-control @error('genero') is-invalid @else border-0 @enderror" id="genero" name="genero" placeholder="Seleccionar">
				<option value="">Seleccionar</option>
			<option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : ''}}>Femenino</option>
			 <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : ''}}>Masculino</option>
			</select>
		  </div>
			<br>
			{{--<button class="btn btn-primary btn-large btn-block"> {{ $btnText }}</button>
			<a class="btn btn-primary btn-large btn-block" href="{{ route('duenios.index') }}"> Cancelar </a>--}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Button trigger modal -->



<script>
	$(document).ready(function(){
		$('#addform').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				type:"POST",
				url: "/duenios",
				data: $('#addform').serialize(),
				success: function (response){
					console.log(response)
					$('#duenioadd').modal('hide')
					alert("Data Saved");
				},
				error: function(error){
					console.log(error)
					alert("data not saved");
				}
			});
		});
	});
</script>