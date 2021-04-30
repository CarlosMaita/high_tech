<?php

use Illuminate\Support\Facades\Route;
use App\Subscriber;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');

// Vitrina total
Route::get('/products', 'ProductsPageController@index')->name('products');
// Vitrina total
Route::get('/products/search', 'ProductsPageController@showSearch')->name('products.search');
// Vitrina por categoria
Route::get('/categorias/{slug}', 'ProductsPageController@showByCategory');
// Vitrina filtrada
Route::get('/products/search/filters', 'ProductsPageController@showByFilter')->name('products.search.filter');
// Detalles del product
Route::get('/product/{slug}', 'ProductsPageController@show')->name('product');

/* ----------------------------  RUTAS DE PRUEBA PARA EL CMS -----------------------*/

Route::middleware('auth')->group(function () {

	Route::get('/cms', 'CmsController@index')->middleware('can:cms.index')->name('cms.index');

    /* ----------  RUTA USUARIOS ---------*/
	Route::get('/cms/users', 'Admin\UserController@index')->middleware('can:cms.users.show')->name('cms.users.show');
	Route::get('/cms/users/user', 'Admin\UserController@create')->middleware('can:cms.users.create')->name('cms.users.create');
	Route::post('/cms/users/user', 'Admin\UserController@store')->middleware('can:cms.users.store')->name('cms.users.store');
	Route::get('/cms/users/user/{id}', 'Admin\UserController@edit')->middleware('can:cms.users.edit')->name('cms.users.edit');
	Route::post('/cms/users/user/{id}', 'Admin\UserController@update')->middleware('can:cms.users.update')->name('cms.users.update');
	Route::delete('/cms/users/user/{id}', 'Admin\UserController@destroy')->middleware('can:cms.users.destroy')->name('cms.users.destroy');

    /* ----------  RUTA CATEGORIAS PRODUCTOS CONTROLLADOR ---------*/
    Route::get('/cms/productos/categorias', 'ProductController@showCategorias')->middleware('can:cms.products.categories.show')->name('cms.products.categories.show');
    Route::get('/cms/editar/producto/category/{id}', 'ProductController@editarCategory')->middleware('can:cms.products.categories.edit')->name('cms.products.categories.edit');
    Route::post('/cms/actualizar/product/category/{id}', 'ProductController@actualizarCategory')->middleware('can:cms.products.categories.update')->name('cms.products.categories.update');

	/* ----------  RUTA PRODUCTOS CONTROLLADOR ---------*/
	Route::get('/cms/productos', 'ProductController@index')->middleware('can:cms.products.show')->name('cms.products.show');
	Route::get('/cms/crear/productos', 'ProductController@crearProducto')->middleware('can:cms.products.create')->name('cms.products.create');
	Route::post('/cms/guardar/producto', 'ProductController@guardarProducto')->middleware('can:cms.products.store')->name('cms.products.store');
	Route::get('/cms/editar/producto/{id}', 'ProductController@editarProducto')->middleware('can:cms.products.edit')->name('cms.products.edit');
	Route::post('/cms/actualizar/producto/{id}', 'ProductController@actualizarProducto')->middleware('can:cms.products.update')->name('cms.products.update');
	Route::delete('/cms/eliminar/producto/{id}', 'ProductController@eliminarProducto')->middleware('can:cms.products.destroy')->name('cms.products.destroy');

	/* ----------  RUTA CATEGROIAS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/categorias', 'Blog\CategoriesController@index')->middleware('can:cms.blog.categories.show')->name('cms.blog.categories.show');
	Route::get('/cms/blog/crear/categoria', 'Blog\CategoriesController@crearCategoria')->middleware('can:cms.blog.categories.create')->name('cms.blog.categories.create');
	Route::post('/cms/blog/guardar/categoria', 'Blog\CategoriesController@guardarCategoria')->middleware('can:cms.blog.categories.store')->name('cms.blog.categories.store');
	Route::get('/cms/blog/editar/categoria/{id}', 'Blog\CategoriesController@editarCategoria')->middleware('can:cms.blog.categories.edit')->name('cms.blog.categories.edit');
	Route::post('/cms/blog/actualizar/categoria/{id}', 'Blog\CategoriesController@actualizarCategoria')->middleware('can:cms.blog.categories.update')->name('cms.blog.categories.update');
	Route::delete('/cms/blog/eliminar/categoria/{id}', 'Blog\CategoriesController@eliminarCategoria')->middleware('can:cms.blog.categories.destroy')->name('cms.blog.categories.destroy');

	/* ----------  RUTA ARTICULOS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/articulos', 'Blog\ArticuloController@index')->middleware('can:cms.blog.show')->name('cms.blog.show');
	Route::get('/cms/blog/crear/articulos', 'Blog\ArticuloController@create')->middleware('can:cms.blog.create')->name('cms.blog.create');
	Route::post('/cms/blog/guardar/articulo', 'Blog\ArticuloController@store')->middleware('can:cms.blog.store')->name('cms.blog.store');
	Route::get('/cms/blog/editar/articulo/{id}', 'Blog\ArticuloController@edit')->middleware('can:cms.blog.edit')->name('cms.blog.edit');
	Route::post('/cms/blog/actualizar/articulo/{id}', 'Blog\ArticuloController@update')->middleware('can:cms.blog.update')->name('cms.blog.update');
	Route::delete('/cms/blog/eliminar/articulo/{id}', 'Blog\ArticuloController@destroy')->middleware('can:cms.blog.destroy')->name('cms.blog.destroy');
});

/*------------------------------------ END --------------------------*/

Auth::routes();

Route::get('/blog', 'BlogController@index')->name('main.blog.home');
Route::get('/blog/{slug}', 'BlogController@post')->name('main.blog.show');
Route::get('/blog-categorie/{slug}', 'BlogController@postsWithCategorie')->name('main.blog.categorie');
Route::get('/blog-tags/{keyword}', 'BlogController@postByTag')->name('main.blog.tag');



