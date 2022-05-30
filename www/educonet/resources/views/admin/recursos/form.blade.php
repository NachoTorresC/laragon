<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulario</title>
</head>
<body>	
    <div class="container">
        <div class="row mt-3">
			<div class="col-6">
				<form enctype="multipart/form-data" method="POST" action="{{ $route }}">
					@csrf
					@isset($update)
					@method("PUT")
					@endisset
					<div class="mb-3">
						<label for="recurso" class="form-label">Nombre del recurso</label>
						<input name="nombre" value="{{ $recursos->nombre}} {{old('nombre') }}" type="text" class="form-control" id="recurso" >

					{{-- 	<!-- Verificación-->
						@error('titulo')
						<br>
						<small class="text-danger">* Tiene que escribir un nombre</small>
						<br>
							
						@enderror --}}
					</div>
				
                    <div class="mb-3">
						<label for="recurso" class="form-label">Apellido</label>
						<input name="categoria" value="{{ $recursos->apellido}} {{old('apellido') }}" type="text" class="form-control" id="categoria" >

							<!-- Verificación-->
						@error('apellido')
						<br>
						<small class="text-danger">* Tiene que tener algun apellido</small> 
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="recurso" class="form-label">correo</label>
						<input name="correo" value="{{ $recursos->correo}} {{old('correo') }}" type="email" class="form-control" id="recurso" > <!-- en el value el old es por si falta algo y saltan verificaciones el campo que esté completo se mantiene-->

							<!-- Verificación-->
						@error('correo')
						<br>
						<small class="text-danger">* No puede quedar el correo vacio </small>
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="recurso" class="form-label">telefono del profesor</label>
						<input name="telefono" value="{{ $recursos->telefono}} {{old('telefono')}}" type="number" min=1 max=999999999 class="form-control" id="id_profesores" > <!-- min y max restringen los valores que puede tomar el campo id profesor-->

							<!-- Verificación-->
						@error('telefono')
						<br>
						<small class="text-danger" >* Tiene que registrar un telefono</small>
						<br>
							
						@enderror
					</div>
					
					

				

					<button type="submit" class="btn btn-primary">Crear curso</button>
				</form>
			</div>
    </div>
    
    
</body>
</html>