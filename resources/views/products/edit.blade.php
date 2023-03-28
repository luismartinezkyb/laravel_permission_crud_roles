@extends('layouts.main')
@section('contenido')
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h1>Editar producto</h1>

				</div>
				<div class="card-body">
					<form action="{{ route ('admin.products.update', $product->id)}}" method="post" >
						@method('put')
						@csrf

						<div class="form-group">
							<label for="">Descripción</label>
							<input value="{{ $product->description }}" type="text" class="form-control" name="description">
						</div>
						<div class="form-group">
							<label for="">Precio</label>
							<input value="{{$product->price}}" type="number" class="form-control" name="price">
						</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
						<a href="{{ route('products.index')}} " class="btn btn-danger">Cancelar</a>
					</form>

				</div>
			</div>
		</div>
	</div>

</div>
@endsection
