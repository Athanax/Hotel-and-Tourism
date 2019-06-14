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

Auth::routes();
Route::resource('pages', 'PagesController');
Route::post('pages/message', 'PagesController@message')->name('pages.message');

Route::get('/', 'PagesController@index')->name('homepage');
Route::get('/contact', 'PagesController@contact')->name('pages.contact');
Route::get('/news', 'PagesController@news')->name('pages.news');
Route::get('/error', 'PagesController@not_found')->name('pages.not_found');
Route::get('/portfolio', 'PagesController@portfolio')->name('pages.portfolio');

/**
 * sites controller routes.
 */
Route::resource('sites', 'SitesController');
Route::post('sites/contact', 'SitesController@contact')->name('sites.contact');
Route::get('sites/image', 'SitesController@image')->name('sites.image');
Route::get('sites/rates/{id}', 'SitesController@create_rates')->name('sites.create_rates');
Route::post('/sites/rates','SitesController@rates')->name('sites.rates');
Route::get('/sites/images/{id}','SitesController@images')->name('sites.images');

    /**
     * hotels controller routes
     */

    Route::resource('booksites', 'BooksitesController');
    Route::resource('hotels', 'HotelsController'); 
    Route::get('hotels/about/{id}', 'HotelsController@about')->name('hotels.about');     
    Route::get('hotels/contact/{id}', 'HotelsController@contact')->name('hotels.contact');     
    Route::get('hotels/news/{id}', 'HotelsController@news')->name('hotels.news');
    Route::get('hotels/check/{id}', 'HotelsController@check')->name('hotels.check');  
    Route::post('hotels/book', 'HotelsController@book')->name('hotels.book');     
    Route::post('hotels/pay', 'HotelsController@pay')->name('hotels.pay');
    Route::post('hotels/message', 'HotelsController@message')->name('hotels.message'); 
    Route::get('hotels/images/{id}', 'HotelsController@images')->name('hotels.images');
    Route::post('hotels/room', 'HotelsController@room')->name('hotels.room');
    Route::post('hotels/store_room', 'HotelsController@store_room')->name('hotels.store_room');
    Route::post('hotels/img_store', 'HotelsController@img_store')->name('hotels.img_store');    






    Route::middleware(['auth'])->group(function(){
    /**
     * images controller routes
     */

    Route::resource('siterates', 'SiteratesController'); 
    Route::resource('images', 'ImagesController');
    Route::get('images/hotel/{id}', 'ImagesController@hotel')->name('images.hotel');     
    Route::get('images/site/{id}', 'ImagesController@site')->name('images.site');     


    Route::resource('siteimages', 'SiteimagesController@site'); 
    
    Route::resource('testimonials', 'TestimonialsController');
    Route::post('testimonials/review', 'TestimonialsController@review')->name('testimonials.review');     
    Route::post('testimonials/unpublish', 'TestimonialsController@unpublish')->name('testimonials.unpublish');     
    Route::post('testimonials/publish', 'TestimonialsController@publish')->name('testimonials.publish');     

    
    /**
     * booksites controller routes
     */
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('booksites/visit', 'BooksitesController@visit')->name('booksite.visit');
    Route::post('booksites/cancel', 'BooksitesController@cancel')->name('booksite.cancel');

    // Route::get('/home', 'HomeController@index')->name('home');
    
    Route::post('sites/img_store', 'SitesController@img_store')->name('sites.img_store');

    Route::get('/report','ReportController@index')->name('report');
    


    /**
     *Reviews controller from violas project
     */
    Route::resource('review','ReviewsController');
    Route::get('/start','ReviewsController@start')->name('start');
    Route::post('/see_result','ReviewsController@see_result')->name('see_result');
    
    /**
     * admins controller routes
     */
    
    Route::post('/home/manage', 'AdminsController@assign')->name('home.assign');
    Route::get('/home/news', 'AdminsController@news')->name('home.news');
    Route::post('/home/store', 'AdminsController@store_news')->name('home.store_news');
    Route::post('/home/publish', 'AdminsController@publish')->name('home.publish');

    });

Auth::routes();


Auth::routes();

// Route::get('/', function () {
//     return view('sites.index');
// });

// Route::match(['post', 'get'], '/', [
//     'as' => '/',
//     'uses' => 'SitesController@index'
// ]);


