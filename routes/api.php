<?php
use Illuminate\Support\Facades\Route;


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

//RecoveryPassword
Route::resource('/passwordRecovery', 'PasswordRecoveryController');
Route::post('/passwordRecovery/ChangePassword', 'PasswordRecoveryController@ChangePassword');

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
Route::get('/user/myInformations',           'UsersController@myInformations');
Route::get('/user/authenticated',           'UsersController@authenticated');
Route::resource('/users',                   'UsersController');
Route::resource('/roles',                   'RolesController');

// Occurrences
Route::post('/occurrence-reports/changeStatus', 'OccurrenceReportsController@changeStatus');
Route::get('/occurrence-reports/countAllOccurrenceOfMonthOfTheYear',  'OccurrenceReportsController@countAllOccurrenceOfMonthOfTheYear');
Route::get('/occurrence-reports/countOccurrenceOfOneType',  'OccurrenceReportsController@countOccurrenceOfOneType');
Route::get('/occurrence-reports/countOccurrenceOfEachType',  'OccurrenceReportsController@countOccurrenceOfEachType');
Route::get('/occurrence-reports/listOccurrenceOfAYearAgo',  'OccurrenceReportsController@listOccurrenceOfAYearAgo');
Route::get('/occurrence-reports/getAllOfTheYear',  'OccurrenceReportsController@getAllOfTheYear');
Route::get('/occurrence-reports/myList',  'OccurrenceReportsController@myList');
Route::resource('/occurrence-reports',      'OccurrenceReportsController');//JVMN - Linha de código responsável por retornar os dados, que serão usados nos relatórios, das requisições http.
Route::resource('/occurrence-types',        'OccurrenceTypesController');
Route::resource('/object',                  'OccurrenceObjectsController');
Route::resource('/zones',                   'ZonesController');

// Irregularities
//A api method /irregularity-reports possui o metodo de requição da api para fazer as DMLs na base de dados.
Route::get('/irregularity-reports/countAllIrregularityOfMonthOfTheYear',  'IrregularityReportsController@countAllIrregularityOfMonthOfTheYear');
Route::get('/irregularity-reports/countIrregularityOfOneType',  'IrregularityReportsController@countIrregularityOfOneType');
Route::get('/irregularity-reports/countIrregularityOfEachType',  'IrregularityReportsController@countIrregularityOfEachType');
Route::get('/irregularity-reports/getAllOfTheYear',  'IrregularityReportsController@getAllOfTheYear');
Route::get('/irregularity-reports/myList',  'IrregularityReportsController@myList');
Route::resource('/irregularity-reports',    'IrregularityReportsController');
Route::resource('/irregularity-types',      'IrregularityTypesController');

// Emergencies
Route::get('/emergency/listEmergenciesAttention', 'EmergencyController@listEmergenciesAttention');
Route::post('/emergency/insertNewPosition', 'EmergencyController@insertNewPosition');
Route::post('/emergency/changeStatus', 'EmergencyController@changeStatus');
Route::resource('/emergency', 'EmergencyController');
});