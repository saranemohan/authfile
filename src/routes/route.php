<?php
Route::middleware(['web','auth'])->namespace('Semdevops\Authfile\Controllers')->group(function(){
    Route::get('file', 'AuthfileController@getFile')->name('file');
    Route::get('stream', 'AuthfileController@getStream')->name('stream');
});
