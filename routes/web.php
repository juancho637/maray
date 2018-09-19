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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('engagements', 'EngagementController');
Route::get('engagements/{engagement}/print', 'EngagementController@print')->name('engagements.print');
Route::resource('engagements.histories', 'HistoryController');
Route::resource('engagements.purchase_orders', 'PurchaseOrderController');


Route::group(['prefix' => 'finances', 'middleware' => ['auth']], function () {
    
    Route::get('/', function () {
        return redirect()->route('invoices.index');
    });
    Route::resource('credits', 'CreditController');
    Route::resource('deposits', 'DepositController');
    Route::resource('invoices', 'InvoiceController');
    Route::resource('quotations', 'QuotationController');
    Route::resource('expenses', 'ExpenseController');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('clients.index');
    });
    Route::resource('species', 'SpeciesController');
    Route::resource('species.breeds', 'BreedController', ['except'=>['show']]);
    Route::resource('clients', 'ClientController');
    Route::resource('clients.pets', 'PetController', ['except'=>['show']]);
    Route::resource('providers', 'ProviderController', ['except'=>['show']]);
    Route::resource('categories', 'CategoryController', ['except'=>['show']]);
    Route::resource('products', 'ProductController');
    Route::resource('products.stocks', 'StockController', ['except'=>['index', 'show']]);
    Route::resource('users', 'UserController');

});

Route::group(['prefix' => 'api', 'middleware' => ['auth']], function () {

    Route::resource('clients', 'Api\ClientController', ['only'=>['index', 'show'], 'as'=>'api']);

    Route::resource('engagements', 'Api\Engagement\EngagementController', ['only'=>['index', 'destroy', 'update', 'store'], 'as'=>'api']);
    Route::resource('engagements.engagement_details', 'Api\Engagement\EngagementEngagementDetailController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('engagements.histories', 'Api\Engagement\EngagementHistoryController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);
    Route::resource('engagements.purchase_orders', 'Api\Engagement\EngagementPurchaseOrderController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);

    Route::resource('histories', 'Api\History\HistoryController', ['only'=>['update'], 'as'=>'api']);
    Route::resource('histories.formulas', 'Api\History\HistoryFormulaController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('histories.clinic_exams', 'Api\History\HistoryClinicExamController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('histories.engagements.history_engagement', 'Api\History\HistoryClinicExamController', ['only'=>['store'], 'as'=>'api']);

    Route::resource('formulas', 'Api\Formula\FormulaController', ['only'=>['store', 'update'], 'as'=>'api']);
    Route::resource('formulas.formula_details', 'Api\Formula\FormulaFormulaDetailController', ['only'=>['store'], 'as'=>'api']);

    Route::resource('formula_details', 'Api\FormulaDetail\FormulaDetailController', ['only'=>['destroy', 'show', 'update'], 'as'=>'api']);

    Route::resource('purchase_orders.details', 'Api\DetailController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);
    Route::resource('products', 'Api\ProductController', ['only'=>['index', 'show', 'destroy', 'update'], 'as'=>'api']);

});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
