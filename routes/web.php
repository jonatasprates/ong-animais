<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Panel'], function(){
    
    $this->get('admin', 'PanelController@index')->name('admin.home');

    $this->resource('animal', 'AnimalController');
    $this->any('animal/search', 'AnimalController@search')->name('animal.search');
    
    $this->resource('donation', 'DonationController');
    $this->any('donation/search', 'DonationController@search')->name('donation.search');
    
    $this->resource('veterinary', 'VeterinaryController');
    $this->any('veterinary/search', 'VeterinaryController@search')->name('veterinary.search');
    
    $this->resource('user', 'UserController');
    $this->any('user/search', 'UserController@search')->name('user.search');
    
    $this->resource('atendiment', 'AtendimentController');
    $this->any('atendiment/search', 'AtendimentController@search')->name('atendiment.search');
    
    


});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


