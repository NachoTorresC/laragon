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
						<label for="curso" class="form-label">Nombre del curso</label>
						<input name="nombre" value="{{ $cursos->nombre}} {{old('nombre') }}" type="text" class="form-control" id="curso" >

					{{-- 	<!-- Verificación-->
						@error('titulo')
						<br>
						<small class="text-danger">* Tiene que escribir un nombre</small>
						<br>
							
						@enderror --}}
					</div>
				
                    <div class="mb-3">
						<label for="curso" class="form-label">Categoria</label>
						<input name="categoria" value="{{ $cursos->categoria}} {{old('categoria') }}" type="text" class="form-control" id="curso" >

							<!-- Verificación-->
						@error('categoria')
						<br>
						<small class="text-danger">* Tiene que tener alguna categoria</small> 
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="curso" class="form-label">descripcion</label>
						<input name="descripcion" value="{{ $cursos->categoria}} {{old('descripcion') }}" type="text" class="form-control" id="curos" > <!-- en el value el old es por si falta algo y saltan verificaciones el campo que esté completo se mantiene-->

							<!-- Verificación-->
						@error('descripcion')
						<br>
						<small class="text-danger">* No puede quedar la descripción vacía</small>
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="curso" class="form-label">id del profesor</label>
						<input name="id_profesores" value="{{ $cursos->id_profesores}} {{old('id_profesores')}}" type="number" min=1 max=10 class="form-control" id="id_profesores" > <!-- min y max restringen los valores que puede tomar el campo id profesor-->

							<!-- Verificación-->
						@error('id_profesores')
						<br>
						<small class="text-danger" >* Tiene que registrar id_profesores</small>
						<br>
							
						@enderror
					</div>
					
					

				

					<button type="submit" class="btn btn-primary">Crear curso</button>
				</form>
			</div>
    </div>
    
    
</body>
</html>