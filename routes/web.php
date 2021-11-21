<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('login', [Auth\LoginController::class, 'index']);
//Route::post('login', [Auth\LoginController::class, 'userLogin']);


Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login-user', 'Auth\LoginController@userLogin');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/inicio', 'HomeController@index')->name('home');

    Route::resource('usuarios', V1\UsuarioController::class)->only([
        'index', 'create', 'show', 'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('privilegios', V1\PrivilegioController::class)->only([
        'edit', 'update'
    ]);

    // Administrar las solicitudes de proveedores
    Route::get('admin/solicitud', 'Admin\AdminSolicitudController@index')->name('admin.solicitudes');
    Route::get('admin/solicitud/{id}', 'Admin\AdminSolicitudController@show')->name('admin.versolicitud');
    Route::post('admin/solicitud/rechazar', 'Admin\AdminSolicitudController@rechazar')->name('admin.rechazar');
    Route::get('admin/solicitud/aceptar/{id}', 'Admin\AdminSolicitudController@aceptar')->name('admin.aceptar');
    // Abrir documento
    Route::get('admin/documento/{id}', 'Proveedor\SolicitudController@openDocument')->name('admin.opendoc');
    // Comentarios
    Route::post('admin/comentarios', 'Admin\ComentarioController@read')->name('comentario.read');
    // Datos del padrón
    Route::get('admin/padron', 'Admin\AdminPadronController@index')->name('admin.padron');
    Route::get('admin/padron/{padron}', 'Admin\AdminPadronController@show')->name('admin.verpadron');
    // Generar credencial
    Route::view('admin/credencial/{id}', 'admin.credencial.credencial')->name('admin.credencial');
    Route::get('admin/credencial/vista-previa/{padron}', 'Admin\AdminPadronController@vistaPrevia')->name('admin.credencial_previa');
    Route::get('admin/credencial/generar/{padron}', 'Admin\AdminPadronController@generarCredencial')->name('admin.generar-credencial');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth:proveedor'])->group(function () {
    // Home del usuario proveedor
    Route::view('/proveedor/home', 'proveedors.home')->name('proveedor.home');
    Route::view('proveedor/info', 'proveedors.info_proveedor')->name('proveedor.info');
    // Solicitudes
    Route::get('proveedor/solicitud', 'Proveedor\SolicitudController@index')->name('solicitud.index');
    // Guardar información de usuario para solicitud
    Route::get('proveedor/solicitud/create', 'Proveedor\SolicitudController@create')->name('solicitud.create');
    Route::post('proveedor/solicitud', 'Proveedor\SolicitudController@store')->name('solicitud.store');
    // Guardar documentos para la solicitud
    Route::get('proveedor/solicitud/create-docs/{id}', 'Proveedor\SolicitudController@createDocs')->name('solicitud.createDocs');
    Route::post('proveedor/solicitud/docs', 'Proveedor\SolicitudController@storeDocs')->name('solicitud.storeDocs');
    // Editar solicitud
    Route::get('proveedor/solicitud/edit/{solicitud}', 'Proveedor\SolicitudController@edit')->name('solicitud.edit');
    Route::put('proveedor/solicitud/update/{solicitud}', 'Proveedor\SolicitudController@update')->name('solicitud.update');
    Route::get('proveedor/solicitud/edit-docs/{solicitud}', 'Proveedor\SolicitudController@editDocs')->name('solicitud.editDocs');
    Route::post('proveedor/solicitud/update-docs/{solicitud}', 'Proveedor\SolicitudController@updateDocs')->name('solicitud.updateDocs');

    // Realizar pago
    Route::get('proveedor/solicitud/pago/{id}', 'Proveedor\SolicitudController@pago')->name('solicitud.pago');
    Route::view('proveedor/solicitud/mensaje', 'proveedors.solicitudes.message')->name('solicitud.mensaje');

    Route::get('proveedor/solicitud/{id}', 'Proveedor\SolicitudController@show')->name('solicitud.show');
    // Abrir documento
    Route::get('proveedor/documento/{id}', 'Proveedor\SolicitudController@openDocument')->name('doc.open');
    // Ver Comentarios
    Route::post('proveedor/comentarios', 'Admin\ComentarioController@read')->name('proveedor.comentario.read');
    // Cambiar estatus a revisión después de editar solicitud
    Route::get('proveedor/solicitud/cambiar-estatus/{solicitud}', 'Proveedor\SolicitudController@cambiarEstatus')->name('solicitud.cambiarEstatus');
});

// Proveedor authentication
Route::get('/login/proveedor', 'Auth\LoginController@showProveedorLoginForm')->name('proveedor.showLogin');
Route::post('/login/proveedor', 'Auth\LoginController@proveedorLogin')->name('proveedor.login');
Route::get('/register/proveedor', 'Auth\RegisterController@showProveedorRegisterForm')->name('proveedor.showRegister');
Route::post('/register/proveedor', 'Auth\RegisterController@createProveedor')->name('proveedor.register');
Route::post('proveedor/logout', 'Auth\LoginController@proveedorLogout')->name('proveedor.logout');
