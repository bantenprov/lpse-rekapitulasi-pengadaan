<?php

Route::group(['prefix' => 'rekapitulasi-pengadaan', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@index',
        'create'     => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@create',
        'store'     => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@store',
        'show'      => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@show',
        'update'    => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@update',
        'destroy'   => 'Bantenprov\RekapitulasiPengadaan\Http\Controllers\RekapitulasiPengadaanController@destroy',
    ];

    Route::get('/',$controllers->index)->name('rekapitulasi-pengadaan.index');
    Route::get('/create',$controllers->create)->name('rekapitulasi-pengadaan.create');
    Route::post('/store',$controllers->store)->name('rekapitulasi-pengadaan.store');
    Route::get('/{id}',$controllers->show)->name('rekapitulasi-pengadaan.show');
    Route::put('/{id}/update',$controllers->update)->name('rekapitulasi-pengadaan.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('rekapitulasi-pengadaan.destroy');

});

