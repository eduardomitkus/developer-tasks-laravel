<?php

Route::get('/', 'RedirectLoginController@login');

Route::get('/logout','RedirectLoginController@logout')->name('logout');

Route::get('/','HomeController@index')->name('home');

Route::prefix('developer')->middleware('auth')->group(function(){
    Route::get('perfil','DeveloperController@profile')->name('developer.profile');
    Route::get('editar','DeveloperController@edit')->name('developer.edit');
    Route::put('editar/{id}','DeveloperController@update')->name('developer.update');
});

Route::prefix('lista-de-tasks')->middleware('auth')->group(function(){
    Route::get('','ListTaskController@index')->name('list.index');
    Route::get('criar','ListTaskController@create')->name('list.create');
    Route::post('criar','ListTaskController@store')->name('list.store');
    Route::get('editar/{id}','ListTaskController@edit')->name('list.edit');
    Route::put('editar/{id}','ListTaskController@update')->name('list.update');
    Route::delete('deletar/{id}','ListTaskController@destroy')->name('list.destroy');

    Route::prefix('task')->group(function(){
        Route::get('{id}','TaskController@index')->name('task.index');
        Route::get('criar/{id}','TaskController@create')->name('task.create');
        Route::post('criar','TaskController@store')->name('task.store');
        Route::put('mudar-estagio/{id}','TaskController@updateStage')->name('task.updateStage');
        Route::get('editar/{idList}/{idTask}','TaskController@edit')->name('task.edit');
        Route::put('editar/{id}','TaskController@update')->name('task.update');
        Route::delete('deletar/{id}','TaskController@destroy')->name('task.destroy');        
    });
});

Route::prefix('tecnologias')->middleware('auth')->group(function(){
    Route::get('','TechnologyController@index')->name('technology.index');
    Route::get('criar','TechnologyController@create')->name('technology.create');
    Route::post('criar','TechnologyController@store')->name('technology.store');    
    Route::get('editar/{id}','TechnologyController@edit')->name('technology.edit');
    Route::put('editar/{id}','TechnologyController@update')->name('technology.update');
    Route::delete('deletar/{id}','TechnologyController@destroy')->name('technology.destroy');
});

Route::prefix('estagio')->middleware('auth')->group(function(){
    Route::get('aguardando','StageController@waiting')->name('stage.waiting');
    Route::get('executando','StageController@running')->name('stage.running');
    Route::get('concluido','StageController@completed')->name('stage.completed');
    Route::get('tasks','StageController@allStages')->name('stage.all');

});


Auth::routes();

