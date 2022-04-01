<?php


Route::redirect('/', '/login');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});


Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified']], function () {
   Route::get('/client/account', function() {
          return view('auth.account');
        });

    //MY ACCOUNT
    Route::post('/client/account',  'UsersController@account_update')->name('accounts.account_update');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified', 'isComplete']], function () {
    Route::get('/client/activate', function() {
           return view('auth.activate');
         });
 
 });


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified', 'isComplete', 'isSubscribe']], function () {
     
    // Client
    // QUESTIONNAIRE FORM
    Route::get('/client/questionnaire', 'ClientController@questionnaire_index')->name('client.questionnaire_index');
    Route::get('/client/questionnaire/{industry_id}', 'ClientController@questionnaire')->name('client.questionnaire');
    Route::post('/client/questionnaire', 'ClientController@questionnaire_answer')->name('client.questionnaire_answer');

    // LEGAL COMPLIANCE LAWS
    Route::get('/client/legal_compliance_laws', 'ClientController@laws_index')->name('client.laws_index');
    Route::get('/client/legal_compliance_laws/{industry_id}', 'ClientController@laws')->name('client.laws');
    

    //Admin
    Route::get('/library_index', 'AdminController@library_index')->name('library.library_index');
    Route::get('/library_index/{industry_id}', 'AdminController@library')->name('library.library');

    Route::post('/library/industry', 'AdminController@store_industry')->name('library.store_industry');
    Route::post('/library/industry/{industry}', 'AdminController@update_industry')->name('library.update_industry');

    // For editing
    Route::get('/library/industry/edit', 'AdminController@edit_industry')->name('library.edit_industry');
    Route::get('/library/type_of_trade_act_dd', 'AdminController@type_of_trade_act_dd')->name('library.type_of_trade_act_dd');
    Route::get('/library/subtitle_of_law_dd', 'AdminController@subtitle_of_law_dd')->name('library.subtitle_of_law_dd');
    Route::get('/library/title_of_laws', 'AdminController@title_of_laws')->name('library.title_of_laws');
    Route::delete('/library/{industry}', 'AdminController@destroy_industry')->name('library.destroy');

    // Type of trade
    Route::post('/library/type_of_trade', 'AdminController@type_of_trade')->name('library.type_of_trade');
    Route::post('/library/type_of_trade_update/{type_of_trade}', 'AdminController@type_of_trade_update')->name('library.type_of_trade_update');
    Route::get('/library/type_of_trade/{type_of_trade}', 'AdminController@edit_type_of_trade')->name('library.edit_type_of_trade');
    Route::delete('/library/type_of_trade_update/{type_of_trade}', 'AdminController@type_of_trade_destroy')->name('library.type_of_trade_destroy');
    

    // Subtitle of laws
    Route::post('/library/subtitle_of_law/{type_of_trade}', 'AdminController@subtitle_of_law')->name('library.subtitle_of_law');
    Route::get('/library/subtitle_of_law/{subtitle_of_law}', 'AdminController@edit_subtitle_of_law')->name('library.edit_subtitle_of_law');
   
    // Manage Client
    Route::get('/manage_client', 'ManageClientController@manage_client_index')->name('manage_client.manage_client_index');
    Route::get('/manage_client/{user_id}', 'ManageClientController@manage_client')->name('manage_client.manage_client');
    Route::put('/manage_client/{user_id}/subscription', 'ManageClientController@subscription')->name('manage_client.subscription');
    Route::post('/manage_client/{user_id}/update', 'ManageClientController@update_client')->name('manage_client.update_client');
    Route::put('/manage_client/{user_id}/dpass', 'ManageClientController@defaultPassowrd')->name('manage_client.dpass');
    Route::delete('/manage_client/{user_id}/clear_form', 'ManageClientController@clear_form')->name('manage_client.clear_form');
    
    // Add Admin
    Route::get('/add_admin', 'AdminController@add_admin')->name('add_admin.index');
    Route::get('/add_admin/{account}/edit', 'AdminController@edit_admin')->name('add_admin.edit');
    Route::post('/add_admin', 'AdminController@store_admin')->name('add_admin.store');
    Route::put('/add_admin/{account}', 'AdminController@update_admin')->name('add_admin.update');
    Route::delete('/add_admin/{account}', 'AdminController@destroy_admin')->name('add_admin.destroy');

    //Change Password
    Route::get('/change_password', 'UsersController@changepassword')->name('accounts.changepassword');
    Route::put('/change_password/{user}', 'UsersController@passwordupdate')->name('accounts.passwordupdate');
});



