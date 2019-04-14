<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users/image/{filename}',                 'AttachmentsController@showProfileImage');

/** ROTAS ABERTAS */
// Mobile
Route::prefix('mobile')->group(function () {
    Route::post('/users',               'UsersController@mobileStore');
});

/** ROTAS FECHADAS */
Route::middleware('auth:api')->group(function() {

    /*Método resource para acessar qualquer tipo
      de requisições http */

    // Users
    Route::get('/user/authenticated',           'UsersController@authenticated');
    Route::resource('/users',                   'UsersController');
    Route::resource('/roles',                   'RolesController');

    // Occurrences
<<<<<<< HEAD
    Route::resource('/occurrence-reports',      'OccurrenceReportsController'); 
=======
    Route::resource('/occurrence-reports',      'OccurrenceReportsController');//JVMN - Linha de código responsável por retornar os dados, que serão usados nos relatórios, das requisições http.
>>>>>>> 8eec8538ab4e38c3ae222c8ae777ed4316be69d4
    Route::resource('/occurrence-types',        'OccurrenceTypesController');
    Route::resource('/object',                  'OccurrenceObjectsController');
    Route::resource('/zones',                   'ZoneController');

    // Irregularities
    //A api method /irregularity-reports possui o metodo de requição da api para fazer as DMLs na base de dados.
    Route::resource('/irregularity-reports',    'IrregularityReportsController');
    Route::resource('/irregularity-types',      'IrregularityTypesController');

});