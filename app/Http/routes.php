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
Route::get('/download/{idContractor}/{idApplication}/{date}/{filename}/',['as' => 'getFile' ,'uses' => 'FileController@getFile']);

Route::get('/uEdXg6lB66E6pTmKsr4DKFBYYROVEWJaEZtaQoRl/pdf/{id}','PdfController@routePdfApplication') ;

Route::get('/DKFBYYROVEWJaEZtaQoRluEdXg6lB66E6pTmKsr4/pdf/{id}','PdfController@routePdfReport') ;
Route::get('/test','PdfController@testPdf');
Route::get('/client/report/pdf/url/{id}','PdfController@routePdfReport');
Route::get('/client/full-report/pdf/{id}','PdfController@routePdfFullReport');
//Route::get('/github','PdfController@testPdf');

// Contractors->Users 
Route::get('/','Auth\AuthController@showLoginForm');
Route::group(['middleware' => ['web']], function(){
    Route::auth(); // default authentication
    Route::get('/home', 'ApplicationController@index'); // Home
    Route::post('/home','HomeController@postState'); // Post State ( Modal Form)
    Route::get('/home/application/new/{state}',['as' => 'app','uses' => 'ApplicationController@showAddNewAppForm']); // Get Application Form to fill up .
    Route::post('/home/application/new/{state}','ApplicationController@store'); // Post Form -- Home redirection   
    Route::get('/home/application/{state}/{id}/view',['as' => 'showApp','uses' => 'ApplicationController@show']) ; // Show application by id
    Route::get('/home/application/{state}/{id}/update',['as' => 'updateApp','uses' => 'ApplicationController@show']) ; // get update application form
    Route::put('/home/application/{state}/{id}/update','ApplicationController@update') ; // application  update put request
    Route::get('/account' ,'ContractorController@showUpdatePasswordForm') ;
    Route::put('/account' ,'ContractorController@updatePassword') ;

    
});
// Admin Authentication group
Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@getLogout');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');
    
    // Admin Routes...
    Route::get('/admin/home/view/{id}','AdminController@show');
    Route::put('/admin/home/view/{id}','AdminController@updateFlag') ;
    Route::get('/admin/home/contractors','AdminController@listContractors') ;
    Route::get('/admin/account','AdminController@showUpdatePasswordForm');
    Route::put('/admin/account','AdminController@updatePassword') ;
    Route::put('/admin/home/contractors','AdminController@updateStatus') ;
    
    Route::get('/admin/home/{idContractor}/{idApplication}/{filename}','AdminController@getFile');
    Route::controller('admin/home', 'AdminController', [
        'anyData'  => 'datatables.data',
        'getIndex' => 'datatables',
        
    ]);
    Route::post('/admin/drive/skip','AdminController@skipGoogleDrive') ;
    Route::get('/admin/report/new/{id?}','ReportController@getReportForm');
    Route::post('/admin/report/new/{id?}','ReportController@store');
    Route::get('/admin/report/view/{id}','ReportController@show');
    Route::get('/admin/report/update/{id}','ReportController@show');
    Route::put('/admin/report/update/{id}','ReportController@update');
    Route::get('/api/reports','ReportController@index');
    Route::get('/api/clients','ClientController@index');
    Route::get('/admin/client/new','ClientController@create');
    Route::post('/admin/client/new','ClientController@store');
    Route::get('/admin/clients/update/{id}','ClientController@show');
    Route::put('/admin/clients/update/{id}','ClientController@update');
    Route::get('/admin/reports',function(){
        return view('admin.reports.reports-list');    
    });
    Route::get('/admin/clients',function(){
        return view('admin.clients.clients-list');    
    });
    Route::post('admin/clients/search','ClientController@search');
    Route::get('/admin/report/pdf/{id}','ClientController@generatePdf');

});

// Client Authentication group
Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/client/login','ClientAuth\AuthController@showLoginForm');
    Route::post('/client/login','ClientAuth\AuthController@login');
    Route::get('/client/logout','ClientAuth\AuthController@getLogout');
    
    // Client Routes...
    Route::get('/client/home','ReportClientController@index');
    Route::get('/client/report/view/{id}','ReportClientController@show');
  //  Route::get('/client/report/pdf/{id}','ReportClientController@show');
   Route::get('/client/report/pdf/{client}/{id?}/','ReportClientController@generatePdf');

});


 /*
|--------------------------------------------------------------------------
| Google Drive Routes
|--------------------------------------------------------------------------
|
*/   
Route::get('/admin/drive',function(){
   if(Auth::guard('admin')->user()->id == 1) {
     File::requireOnce(app_path().'/Http/Services/google/index.php') ;
     
   }
   else {
     return redirect('/admin/home') ;
   }
})->middleware('admin');

Route::post('/admin/drive',function(){
   
   include(app_path().'/Http/Services/google/index.php') ;
   //return redirect('/admin/home') ;
})->middleware('admin');
