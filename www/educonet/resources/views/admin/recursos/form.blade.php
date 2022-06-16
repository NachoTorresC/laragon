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
						<input name="nombre" value="{{ $recursos->nombre}} " type="text" class="form-control" id="recurso" >

						<!-- Verificación-->
						@error('nombre')
						<br>
						<small class="text-danger">* Tiene que escribir un nombre</small>
						<br>
							
						@enderror 
					</div>
				
                    <div class="mb-3">
						<label for="recurso" class="form-label">Autor</label>
						<input name="autor" value="{{ $recursos->autor}}" type="text" class="form-control" id="autor" >

							<!-- Verificación-->
						@error('autor')
						<br>
						<small class="text-danger">* Tiene que tener algun autor</small> 
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="recurso" class="form-label">Categoria</label>
						<input name="categoria" value="{{ $recursos->categoria}} " type="text" class="form-control" id="categoria" > <!-- en el value el old es por si falta algo y saltan verificaciones el campo que esté completo se mantiene-->

							<!-- Verificación-->
						@error('categoria')
						<br>
						<small class="text-danger">* No puede quedar la categoria vacia </small>
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="recurso" class="form-label">Descripción del recurso</label>
						<input name="descripcion" value="{{ $recursos->descripcion}} " type="text"  class="form-control" id="descripcion" > 

							<!-- Verificación-->
						@error('descripcion')
						<br>
						<small class="text-danger" >* Tiene que registrar una descripción</small>
						<br>
							
						@enderror
					</div>
					
					<div class="mb-3">
						<label for="recurso" class="form-label">Id del profesor</label>
						<input name="id_profesores" value="{{ $recursos->id_profesores}}" type="number" min="1" max="10"  class="form-control" id="id_profesores" > 

							<!-- Verificación-->
						@error('id_profesores')
						<br>
						<small class="text-danger" >* Tiene que registrar un id_profesores</small>
						<br>
							
						@enderror
					</div>
					<div class="mb-3">
						<label for="Imagen" class="mr-3">Imagen</label> 
						<input id="Imagen" type="file" name="Imagen" value="{{$recursos->imagen}}">
						<label >{{$recursos->Imagen}}</label>
						
						@error('Imagen')
						<br>
						<small class="text-danger" >* Tiene que registrar una imagen</small>
							<br>
						@enderror
						
						
					</div>
					<div class="mb-3">
						<label for="descargable" class="mr-3">descargable</label> 
						<input id="descargable" type="file" name="descargable" value="{{$recursos->descargable}}">
						<label >{{$recursos->descargable}}</label>
						
						@error('descargable')
						<br>
						<small class="text-danger" >* Tiene que registrar un descargable</small>
							<br>
						@enderror
						
						
					</div>
					
					

				

					<button type="submit" class="btn btn-primary d-block mx-auto">Crear recurso</button>
				</form>
			</div>
    </div>
    
    
</body>
</html>