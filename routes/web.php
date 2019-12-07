<?php

Route::get('/', function () {
    return redirect()->route('Mascota.inicio');
});

Route::prefix('Razas')->group(function(){
    Route::get('Inicio', 'RazaController@index')->name('Raza.inicio');
    Route::get('Nuevo', 'RazaController@create')->name('Raza.nuevo');
    Route::post('Guardar', 'RazaController@store')->name('Raza.guardar');
    Route::get('Editar/{id}', 'RazaController@edit')->name('Raza.editar');
    Route::delete('Borrar/{id}', 'RazaController@destroy')->name('Raza.borrar');
});

Route::prefix('Mascotas')->group(function(){
    Route::get('Inicio', 'MascotaController@index')->name('Mascota.inicio');
    Route::get('Nuevo', 'MascotaController@create')->name('Mascota.nuevo');
    Route::post('Guardar', 'MascotaController@store')->name('Mascota.guardar');
    Route::delete('Borrar/{id}', 'MascotaController@destroy')->name('Mascota.borrar');
    Route::get('Editar/{id}', 'MascotaController@edit')->name('Mascota.editar');
});
