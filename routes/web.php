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
Route::resource('engagement_details', 'DetailEngagementController');
Route::get('engagements/{engagement}/print', 'EngagementController@print')->name('engagements.print');
Route::resource('engagements.histories', 'HistoryController');
Route::resource('engagements.purchase_orders', 'PurchaseOrderController');


Route::group(['prefix' => 'finances', 'middleware' => ['auth']], function () {
    
    Route::get('/', function () {
        return redirect()->route('purchaseOrders.index');
    });
    Route::resource('balances', 'BalanceController');
    Route::resource('purchaseOrders', 'PurchaseOrderController');
    //Route::resource('invoices', 'InvoiceController');
    //Route::resource('quotations', 'QuotationController');
    Route::resource('deposits', 'DepositController');
    Route::resource('credits', 'CreditController');
    //Route::resource('credits.creditPayments', 'CreditPaymentController', ['only'=>['store']]);
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
    Route::resource('areas', 'AreaController');
    Route::resource('areas.categories', 'CategoryController', ['except'=>['show', 'index']]);
    Route::resource('expenseTypes', 'ExpenseTypeController', ['except'=>['show']]);
    Route::resource('products', 'ProductController');
    Route::resource('products.stocks', 'StockController', ['except'=>['index', 'show']]);
    Route::resource('users', 'UserController');

});

Route::group(['prefix' => 'api', 'middleware' => ['auth']], function () {

    Route::resource('clients', 'Api\ClientController', ['only'=>['index', 'show'], 'as'=>'api']);
    Route::resource('clients.deposits', 'Api\Client\ClientDepositController', ['only'=>['index'], 'as'=>'api']);

    Route::resource('engagements', 'Api\Engagement\EngagementController', ['only'=>['index', 'destroy', 'update', 'store'], 'as'=>'api']);
    Route::resource('engagements.engagement_details', 'Api\Engagement\EngagementEngagementDetailController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('engagements.histories', 'Api\Engagement\EngagementHistoryController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);
    Route::resource('engagements.purchase_orders', 'Api\Engagement\EngagementPurchaseOrderController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);

    Route::resource('engagement_details', 'Api\EngagementDetail\EngagementDetailController', ['only'=>['update', 'destroy'], 'as'=>'api']);

    Route::resource('histories', 'Api\History\HistoryController', ['only'=>['update'], 'as'=>'api']);
    Route::resource('histories.formulas', 'Api\History\HistoryFormulaController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('histories.clinic_exams', 'Api\History\HistoryClinicExamController', ['only'=>['store'], 'as'=>'api']);
    Route::resource('histories.history_engagement', 'Api\History\HistoryHistoryEngagementController', ['only'=>['index'], 'as'=>'api']);

    Route::resource('formulas', 'Api\Formula\FormulaController', ['only'=>['store', 'update'], 'as'=>'api']);
    Route::resource('formulas.formula_details', 'Api\Formula\FormulaFormulaDetailController', ['only'=>['store'], 'as'=>'api']);

    Route::resource('formula_details', 'Api\FormulaDetail\FormulaDetailController', ['only'=>['destroy', 'show', 'update'], 'as'=>'api']);

    Route::resource('purchase_orders.details', 'Api\PurchaseOrder\PurchaseOrderPurchaseOrderDetailController', ['only'=>['store', 'update', 'destroy'], 'as'=>'api']);
    Route::resource('products', 'Api\ProductController', ['only'=>['index', 'show', 'destroy', 'update'], 'as'=>'api']);

    Route::resource('history_engagement', 'Api\HistoryEngagement\HistoryEngagementController', ['only'=>['store'], 'as'=>'api']);
});

Route::group(['prefix' => 'datatable', 'middleware' => ['auth']], function () {
    Route::resource('deposits', 'DataTable\DepositController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('balances', 'DataTable\BalanceController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('purchaseOrders', 'DataTable\PurchaseOrderController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('credits', 'DataTable\CreditController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('expenses', 'DataTable\ExpenseController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('expenseTypes', 'DataTable\ExpenseTypeController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('areas', 'DataTable\AreaController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('areas.categories', 'DataTable\AreaCategoryController', ['only'=>['index'], 'as'=>'datatable']);
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
