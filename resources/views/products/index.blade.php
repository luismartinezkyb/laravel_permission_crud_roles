@extends('layouts.main')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h1>Listado de productos</h1>
					@can('create_product')
                        <a href="{{route('products.create')}}" class="btn btn-success btn-sm float-right">Nuevo Producto</a>

                    @endcan
				</div>
				<div class="card-body">
					@if(session('info'))
					<div class="alert alert-success">
						{{session('info')}}
					</div>

					@endif
					<table class="table table-hover table-sm">
						<thead>
                            <th>Id</th>
							<th>Descripcion</th>
							<th>Precio $</th>
                            <th>Acciones</th>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
                                <td>{{$product->id}}</td>
								<td>{{$product->description}}</td>
								<td>$ {{$product->price}}</td>

								<td>
                                    @can('edit_product')
                                        <a class="btn btn-warning" href="{{route('admin.products.edit', $product->id)}}" title="">Editar</a>
                                    @endcan

									@can('delete_product')
                                        <a href="javascript: document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-danger btn-sm" title="">Eliminar</a></td>
                                        <form id='delete-{{ $product->id }}' action="{{route('products.destroy', $product->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    @endcan

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					Bienvenido {{auth()->user()->name}}
					<a href="javascript:document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Cerrar sesión</a>
					<form method="post" style="display:none;" id="logout" action="{{route('logout')}}">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
