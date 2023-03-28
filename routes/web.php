<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;


Route::middleware('auth')->group(function(){
	Route::get('/', function () {
    return view('welcome');
	});

	Route::get('/products', function(){
		$products= Product::orderBy('created_at', 'desc')->get();
		return view('products.index', compact('products'));
	})->name('products.index');

	Route::get('/products/create', function(){
		return view('products.create');
	})->name('products.create');


	//creacion de ruta para un formulario con request
	Route::post('/products', function(Request $request){

		$newProduct= new Product();
		$newProduct->description= $request->input('description');
		$newProduct->price= $request->input('price');
		$newProduct->save();

		return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');

	})->name('products.store');
	//inyeccion de dependencias

	//Ruta para eliminar productos
	Route::delete('/products/{id}', function($id){

		$product= Product::findOrFail($id); //Otro metodo Product:: findOrFail all() oderBy
		$product->delete();

		return redirect()->route('products.index')->with('info', 'Producto eliminado exitosamente');
	})->name('products.destroy');

	//Ruta para editar productos
    Route::group([
        'prefix'=>  'admin',
        'middleware'=> "is_admin",
        'as' =>  'admin.'
    ], function(){
        Route::get('/prueba', function(){
            return 'hola admin';
        });
        Route::get('/products/{id}/edit', function($id){
            $product=Product::findOrFail($id);
            return view('products.edit', compact('product'));
        })->name('products.edit');


        Route::put('/products/{id}', function(Request $request, $id){

            $product= Product::findOrFail($id);
            $product->description= $request->input('description');
            $product->price= $request->input('price');
            $product->save();
            return redirect()->route('products.index')->with('info', '¡Producto actualizado exitosamente!');
        })->name('products.update');
    });

});

Auth::routes();

