<?php
Route::group([
    'namespace' => 'Blessedkono\Pesapal\Http\Controllers',
], function() {

    Route::get('/pesapal','PesapalController@pesapalInit');
});

