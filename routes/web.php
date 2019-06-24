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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
Route::group(['prefix' => 'admin', 'middleware'=>'Admin'],function () {
Route::get('/', 'Admin\AdminController@index')->name('admin');
Route::resource('User','Admin\UserController');

Route::resource('product/Category','Admin\product\CategoryController');
Route::resource('product/SubCategory','Admin\product\SubCategoryController');
Route::resource('product/SubtwoCategory','Admin\product\SubtwoCategoryController');
Route::resource('Product','Admin\product\ProductController');
Route::get('subcategory-list-product','Admin\product\ProductController@getSubcategory');
Route::get('filter-list-product','Admin\product\ProductController@getFilter');
Route::delete('image/', 'Admin\product\ProductController@deleteimage')->name('image');

Route::resource('video/Category','Admin\video\CategoryController');
Route::resource('video/SubCategory','Admin\video\SubCategoryController');
Route::resource('video/SubtwoCategory','Admin\video\SubtwoCategoryController');
Route::resource('Video','Admin\video\VideoController');
Route::get('subcategory-list','Admin\video\VideoController@getSubcategory');
Route::get('filter-list','Admin\video\VideoController@getFilter');

Route::resource('training/Category','Admin\training\CategoryController');
Route::resource('training/SubCategory','Admin\training\SubCategoryController');
Route::resource('training/SubtwoCategory','Admin\training\SubtwoCategoryController');
Route::resource('training','Admin\training\TrainingController');
Route::get('subcategory-list-training','Admin\training\TrainingController@getSubcategory');
Route::get('filter-list-training','Admin\training\TrainingController@getFilter');

Route::resource('CategoriesNews','Admin\CategoryNewController');
Route::resource('Service','Admin\ServiceController');

Route::resource('Slider','Admin\SliderController');
Route::resource('Page','Admin\PageController');
Route::resource('About','Admin\AboutController');
Route::resource('Section','Admin\SectionController');
Route::resource('Project','Admin\ProjectController');


Route::resource('News','Admin\NewSiteController');
Route::resource('Manufactor','Admin\ManufactorController');
Route::resource('Ads','Admin\AdsController');
Route::resource('permissions','Admin\PermissionController');
Route::resource('Roles','Admin\RoleController');
Route::resource('setting', 'Admin\SettingController');
Route::get('social','Admin\SettingController@getsocail')->name('socialmedia');
Route::match(['put', 'patch'],'social/{social}','Admin\SettingController@social')->name('updatesocial');
Route::post('addsocial','Admin\SettingController@addsocial')->name('savesocial');


// Route::get('admin/{id}','Admin\CustomerController@admin')->name('useradmin');
Route::get('unadmin/{id}','Admin\UserController@unadmin')->name('userunadmin');

});
//redirect to defult lang from yourdomain.com to yourdomain.com/en, 
//getcities
// Route::get('City-list','Admin\CustomerController@getcities');
// set_lang
// Route::get('/', function () {
//     return redirect(app()->getLocale());
// });

// // Route::get('language/{lang}', function ($lang) {
// //        Session::put('locale', $lang);
// //        return back();
// // })->name('langroute');

Route::group([
    'middleware' => ['setlocale'],
  ]
  , function() {
    // any route at front should be has name to load translate of it 
    //set lang president
    Route::get('setlang/{locale}', 'HomeController@set_lang');
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('/search','HomeController@search')->name('search');
    Route::get('about','Front\PageController@about')->name('About');
    Route::get('president','Front\PageController@president')->name('President');
    Route::get('page/{page}', 'Front\PageController@show')->name('page'); 
    Route::get('section/{section}', 'Front\PageController@section')->name('section'); 
    // projects list
    Route::get('projects', 'Front\PageController@projects')->name('projects');
    Route::get('Project/{project}','Front\PageController@projectdetailis')->name('Project');
    
    //news 
    Route::get('news','Front\PageController@news')->name('News');
    Route::get('new/{newslist}','Front\PageController@newsdetailis')->name('new');
    Route::get('newscategory/{newscat}','Front\PageController@newscategory')->name('Newscategory');

    //news 
    Route::get('services','Front\PageController@services')->name('services');
    Route::get('services/{service}','Front\PageController@servicesdetailis')->name('service');

    //contact us
    Route::get('contact-us', 'Front\PageController@contactUS')->name('Contact');
    Route::post('contact-us', ['as'=>'contactus.store','uses'=>'Front\PageController@contactUSPost']);

    //Training 
    Route::get('training/category/{slug}', 'Front\TrainingController@training_category')->name('category.trainings');
    Route::get('training/subcategory/{slug}', 'Front\TrainingController@subcategory')->name('Subcategory.trainings');
    Route::get('training/subcategorytwo/{slug}', 'Front\TrainingController@subcategorytwo')->name('Subcategorytwo.trainings');
    Route::get('training/{slug}', 'Front\TrainingController@training_details')->name('training.name');

    //product 
    Route::get('product/category/{slug}', 'Front\ProductController@product_category')->name('category.products');
    Route::get('product/subcategory/{slug}', 'Front\ProductController@subcategory')->name('Subcategory.products');
    Route::get('product/subcategorytwo/{slug}', 'Front\ProductController@subcategorytwo')->name('Subcategorytwo.products');
    Route::get('products/{slug}', 'Front\ProductController@product_details')->name('product.name');

    // show_profile
    Route::get('profile', 'Front\AccountController@show_profile')->name('Profile');
    Route::match(['put', 'patch'],'profile/{id}','Front\AccountController@update_profile')->name('account.update');
    // Route::get('products', 'Front\ProductController@index')->name('products')categoryproduct;
    // product_details
   Route::get('products/{slug}', 'Front\ProductController@product_details')->name('product.name');
  //  subcategorylist
   //================Method/Shopping===================== /search//
Route::get('/Shopping-Cart-Show', 'Front\CartController@CartShow');
Route::post('/Shopping-Cart-Add/{id}', 'Front\CartController@AddToCart');
Route::post('/CartEdit/{id}', 'Front\CartController@editquntity')->name('CartEdit');
Route::get('/Shopping-Cart-Delete/{id}', 'Front\CartController@DeleteCart');
Route::get('/Checkout-Cart', 'Front\ShoppingController@CheckOut');

Route::get('/Checkout', 'Front\ShoppingController@ShowCheckout');

Route::post('/Cart-Login', 'Front\ShoppingController@CartLogin');
// Route::post('Checkout-Order', array('uses' => 'Front\ShoppingController@postorder'));
Route::post('/Add-Copon', 'Front\ShoppingController@CheckAddCopon');
Route::post('/Checkout-Order', 'Front\ShoppingController@AddOrder');
Route::get('/Add-To-Cart/{id}', 'Front\CartController@AddSpeedtoCart');
Route::post('/comment/{product}', 'Front\ProductController@comment')->name('review');
Route::get('/wishlist/{product}', 'Front\ProductController@wishlist')->name('wishlist');
Route::get('/Favorite', 'Front\ProductController@Show_wishlist')->name('/Favorite');
Route::get('/Filter', 'Front\ProductController@filter')->name('Filter');
});