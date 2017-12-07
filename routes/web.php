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
Route::group(['middleware' => 'web'], function() {
	Route::get('checkout/login', 'CheckoutController@login');
	Route::post('checkout/login', 'CheckoutController@postLogin');
	Route::get('checkout/address', 'CheckoutController@address');
	Route::post('checkout/address', 'CheckoutController@postAddress');
	Route::get('checkout/payment', function() {
	return var_dump(session()->get('checkout'));
	});
});

Route::get('/', 'Frontend\HomeController@index');
Route::get('/posts/{id}', 'Frontend\HomeController@postShow');

Auth::routes();

Route::get('/backend/home', 'Backend\HomeController@index')->name('home');

Route::put('/backend/blog/restore/{blog}', [
    'uses' => 'Backend\PostController@restore',
    'as'   => 'backend.blog.restore'
]);
Route::delete('/backend/blog/force-destroy/{blog}', [
    'uses' => 'Backend\PostController@forceDestroy',
    'as'   => 'backend.blog.force-destroy'
]);
Route::resource('/backend/blog', 'Backend\PostController');
Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::get('/backend/users/confirm/{users}', [
    'uses' => 'Backend\UsersController@confirm',
    'as' => 'backend.users.confirm'
]);
Route::resource('/backend/users', 'Backend\UsersController');
Route::get('/backend/edit-account','Backend\HomeController@edit');
Route::put('/backend/edit-account','Backend\HomeController@update');

/** Home User By Role **/
//participants page
Route::get('/backend/home/participantPage','Backend\HomeController@participantPage');
Route::get('/backend/home/myTicketParticipant', 'Backend\HomeController@myTicketParticipant');
Route::post('/backend/home/paymentProof', 'Backend\HomeController@postPaymentProof');
//speakers page
Route::get('/backend/home/speakerPage','Backend\HomeController@speakerPage');
Route::post('/backend/home/uploadAbstract', 'Backend\HomeController@postAbstract');
Route::get('/backend/home/abstractApprove', 'Backend\HomeController@abstractApprove');
Route::post('/backend/home/speakerPayment', 'Backend\HomeController@postSpeakerPayment');
Route::get('/backend/home/speakerPayment', 'Backend\HomeController@getSpeakerPayment');
Route::get('/backend/home/uploadPaper', 'Backend\HomeController@getUploadPaper');
Route::post('/backend/home/uploadPaper', 'Backend\HomeController@postUploadPaper');
Route::get('/backend/home/uploadPaperForm', 'Backend\HomeController@uploadPaperForm');

Route::get('/backend/home/uploadRevisedPaper', 'Backend\HomeController@uploadRevisedPaperForm');
Route::post('/backend/home/uploadRevisedPaper', 'Backend\HomeController@postRevisedPaperForm');
Route::get('/backend/home/myTicketSpeaker', 'Backend\HomeController@myTicketSpeaker');

//payment Aprroval
Route::resource('/backend/provepaymentproof', 'Backend\ApprovalpaymentproofController');
Route::resource('/backend/proveabstract', 'Backend\ApprovalabstractController');
Route::resource('/backend/paperreview', 'Backend\PaperreviewController');



