@extends('layouts.main')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h1>Crear producto</h1>
					
				</div>
				<div class="card-body">
					<form action="{{route('products.store')}}" method="post" >
						@csrf
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" name="name">
						</div>
						<div class="form-group">
							<label for="">Descripción</label>
							<input type="text" class="form-control" name="description">
						</div>
						<div class="form-group">
							<label for="">Precio</label>
							<input type="number" class="form-control" name="price">
						</div>
						<div class="form-group">
							<label for="">Antiguo Precio</label>
							<input type="number" class="form-control" name="old_price">
						</div>
						<div class="form-group">
							<label for="">Descuento</label>
							<input type="number" class="form-control" name="discount">
						</div>
						<div class="form-group">
							<label for="">Cantidad</label>
							<input type="number" class="form-control" name="quantity">
						</div>
						<div class="form-group">
							<label for="">Categoria</label>
							<input type="text" class="form-control" name="category">
						</div>
						<div class="form-group">
							<label for="">Imagen</label>
							<input type="text" class="form-control" name="image">
						</div>

						
						<button type="submit" class="btn btn-primary">Guardar</button>
						<a href=" {{ route('products.index')}}" class="btn btn-danger">Cancelar</a>
					</form>
					
				</div>
			</div>
		</div>
	</div>

</div>
@endsection