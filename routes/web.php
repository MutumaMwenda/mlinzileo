<?php

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


Route::get('/', function() {
	if (\Auth::check()) {
	//return redirect('/incidence_index');
	return redirect()->route('incidence_index');

	}
	else
	{
		//Route::get('/station_index', 'StationController@index')->name('station_index');

	return redirect()->route('incidence_index');
		// return redirect('/incidence_index');

	}


	});
Route::get('/home', function() {
	if (\Auth::check()) {
	//return redirect('/incidence_index');
		return redirect()->route('incidence_index');

	}
	else
	{
		//Route::get('/station_index', 'StationController@index')->name('station_index');

		// return redirect('/incidence_index');
			return redirect()->route('incidence_index');

	}


	});

Route::get('login', function () {
    return view('login');
});
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@do']);



Route::get('/create', 'MahasiswaController@create')->name('create');
Route::post('/create', 'MahasiswaController@store')->name('store');
Route::get('/edit/{id}', 'MahasiswaController@edit')->name('edit');
Route::post('/update/{id}', 'MahasiswaController@update')->name('update');
Route::delete('/delete/{id}', 'MahasiswaController@delete')->name('delete');

Route::get('/incidence_index', 'IncidenceController@index')->name('incidence_index');
Route::get('/incidence_create', 'IncidenceController@create')->name('incidence_create');
Route::post('/incidence_create', 'IncidenceController@store')->name('incidence_store');
Route::get('/incidence_edit/{id}', 'IncidenceController@edit')->name('incidence_edit');
Route::post('/incidence_update/{id}', 'IncidenceController@update')->name('incidence_update');
Route::delete('/incidence_delete/{id}', 'IncidenceController@delete')->name('incidence_delete');


Route::get('/station_index', 'StationController@index')->name('station_index');
Route::get('/station_create', 'StationController@create')->name('station_create');
Route::post('/station_create', 'StationController@store')->name('station_store');
Route::get('/station_edit/{id}', 'StationController@edit')->name('station_edit');
Route::post('/station_update/{id}', 'StationController@update')->name('station_update');
Route::delete('/station_delete/{id}', 'StationController@delete')->name('station_delete');

Route::get('/personnel_index', 'PersonnelController@index')->name('personnel_index');
Route::get('/personnel_create', 'PersonnelController@create')->name('personnel_create');
Route::post('/personnel_create', 'PersonnelController@store')->name('personnel_store');
Route::get('/personnel_edit/{id}', 'PersonnelController@edit')->name('personnel_edit');
Route::post('/personnel_update/{id}', 'PersonnelController@update')->name('personnel_update');
Route::delete('/personnel_delete/{id}', 'PersonnelController@delete')->name('personnel_delete');




Route::get('/test', 'TestController@index');

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/user/{id}', function ($id) {
    return "Your Id is ".$id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
