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
				<form method="POST" action="{{ $route }}">
					@csrf
					@isset($update)
					@method("PUT")
					@endisset
					<div class="mb-3">
						<label for="libro" class="form-label">Título del libro</label>
						<input name="titulo" value="{{ $libros->titulo}}" type="text" class="form-control" id="libro" >
					</div>
                    <div class="mb-3">
						<label for="libro" class="form-label">Temática</label>
						<input name="tematica" value="{{ $libros->tematica}}" type="text" class="form-control" id="libro" >
					</div>
                    <div class="mb-3">
						<label for="libro" class="form-label">Sinopsis</label>
						<input name="sinopsis" value="{{ $libros->sinopsis}}" type="text" class="form-control" id="libro" >
					</div>
                    <div class="mb-3">
						<label for="libro" class="form-label">Autor del libro</label>
						<input name="autor" value="{{ $libros->autor}}" type="text" class="form-control" id="libro" >
					</div>
					<div class="mb-3">
						<label for="libro" class="form-label">portada</label>
						<input name="portada" value="{{ $libros->portada}}" type="text" class="form-control" id="libro" >
					</div>
					

				

					<button type="submit" class="btn btn-primary">Crear libro</button>
				</form>
			</div>
    </div>
    
    
</body>
</html>