<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('/', function () {
        if (Auth::check())
        {
            return view('welcome');
        }
        else
            return view('auth/login');

    });


    Route::get('error', function(){
        abort(500);
    });



    Route::group(['prefix' => 'solidario', 'middleware' => 'auth'], function () {

        Route::resource('welcome', 'WelcomeController');

        Route::resource('users', 'UsersController');
        Route::get('users/{id}/destroy', ['uses' => 'UsersController@destroy', 'as' => 'solidario.user.destroy']);
        Route::get('user/{id}/show', ['uses' => 'UsersController@show', 'as' => 'solidario.user.show']);
        Route::post('user/{id}/update', ['uses' => 'UsersController@update', 'as' => 'solidario.users.update']);
        Route::get('users/{id}/pass', ['uses' => 'UsersController@pass', 'as' => 'solidario.user.pass']);
        Route::post('users/{id}/pass1', ['uses' => 'UsersController@pass1', 'as' => 'solidario.user.pass1']);

        Route::resource('comentarios', 'ComentariosController');
        Route::get('comentarios/{id}/destroy', ['uses' => 'ComentariosController@destroy', 'as' => 'solidario.comentarios.destroy']);
        Route::get('comentarios/{id}/edit', ['uses' => 'ComentariosController@edit', 'as' => 'solidario.comentarios.edit']);
        Route::post('comentarios/{id}/update', ['uses' => 'ComentariosController@update', 'as' => 'solidario.comentarios.update']);

        Route::resource('dictamenes', 'DictamenesController');
        Route::get('dictamenes/{id}/destroy', ['uses' => 'DictamenesController@destroy', 'as' => 'solidario.dictamenes.destroy']);
        Route::get('dictamenes/{id}/edit', ['uses' => 'DictamenesController@edit', 'as' => 'solidario.dictamenes.edit']);
        Route::post('dictamenes/{id}/update', ['uses' => 'DictamenesController@update', 'as' => 'solidario.dictamenes.update']);

        Route::resource('indicadores', 'IndicadoresController');
        Route::get('indicadores/{id}/destroy', ['uses' => 'IndicadoresController@destroy', 'as' => 'solidario.indicadores.destroy']);
        Route::get('indicadores/{id}/edit', ['uses' => 'IndicadoresController@edit', 'as' => 'solidario.indicadores.edit']);
        Route::post('indicadores/{id}/update', ['uses' => 'IndicadoresController@update', 'as' => 'solidario.indicadores.update']);

        Route::resource('orgs', 'OrganizacionesController');
        Route::get('orgs/{id}/destroy', ['uses' => 'OrganizacionesController@destroy', 'as' => 'solidario.orgs.destroy']);
        Route::get('orgs/{id}/edit', ['uses' => 'OrganizacionesController@edit', 'as' => 'solidario.orgs.edit']);
        Route::post('orgs/{id}/update', ['uses' => 'OrganizacionesController@update', 'as' => 'solidario.orgs.update']);

        Route::resource('patrimonios', 'PatrimoniosController');
        Route::get('patrimonios/{id}/destroy', ['uses' => 'PatrimoniosController@destroy', 'as' => 'solidario.patrimonios.destroy']);
        Route::get('patrimonios/{id}/edit', ['uses' => 'PatrimoniosController@edit', 'as' => 'solidario.patrimonios.edit']);
        Route::post('patrimonios/{id}/update', ['uses' => 'PatrimoniosController@update', 'as' => 'solidario.patrimonios.update']);

        Route::resource('reuniones', 'ReunionesController');
        Route::get('reuniones/{id}/destroy', ['uses' => 'ReunionesController@destroy', 'as' => 'solidario.reuniones.destroy']);
        Route::get('reuniones/{id}/edit', ['uses' => 'ReunionesController@edit', 'as' => 'solidario.reuniones.edit']);
        Route::post('reuniones/{id}/update', ['uses' => 'ReunionesController@update', 'as' => 'solidario.reuniones.update']);


    });

    Route::auth();


