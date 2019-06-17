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
Route::resource('Countries','Admin\CountryController');
Route::resource('product/Category','Admin\product\CategoryController');
Route::resource('product/SubCategory','Admin\product\SubCategoryController');

Route::resource('video/Category','Admin\video\CategoryController');
Route::resource('video/SubCategory','Admin\video\SubCategoryController');

Route::resource('training/Category','Admin\training\CategoryController');
Route::resource('training/SubCategory','Admin\training\SubCategoryController');

Route::resource('CategoriesNews','Admin\CategoryNewController');
Route::resource('Cities','Admin\CityController');
Route::resource('Shipping','Admin\Shipping_ZoneController');
Route::resource('Spacification','Admin\SpacificationController');
Route::resource('Filter','Admin\FilterController');
Route::resource('Payment','Admin\PaymentController');
Route::resource('Customer','Admin\CustomerController');
Route::resource('Slider','Admin\SliderController');
Route::resource('Page','Admin\PageController');
Route::resource('Product','Admin\ProductController');

Route::post('filter','Admin\ProductController@filter');
Route::get('subcategory-list','Admin\ProductController@getSubcategory');
Route::get('filter-list','Admin\ProductController@getFilter');
Route::get('specification-list','Admin\ProductController@getSpecification');
Route::get('specificationdetails-list','Admin\ProductController@getSpecificationdetealis');
Route::resource('News','Admin\NewSiteController');
// Route::resource('SubCategory','Admin\SubCategoryController');
Route::resource('Manufactor','Admin\ManufactorController');
Route::resource('Ads','Admin\AdsController');
Route::resource('permissions','Admin\PermissionController');
Route::resource('Roles','Admin\RoleController');
Route::resource('setting', 'Admin\SettingController');
Route::get('comment','Admin\CommentController@index')->name('Comments');
Route::get('/approvecomment/{id}','Admin\CommentController@approved')->name('approved');
Route::get('social','Admin\SettingController@getsocail')->name('socialmedia');
Route::match(['put', 'patch'],'social/{social}','Admin\SettingController@social')->name('updatesocial');
Route::post('addsocial','Admin\SettingController@addsocial')->name('savesocial');

Route::delete('image/', 'Admin\ProductController@deleteimage')->name('image');
Route::resource('Coupon','Admin\CouponController');
Route::resource('Coupon','Admin\CouponController');
Route::resource('Order','Admin\OrderController');
Route::get('admin/{id}','Admin\CustomerController@admin')->name('useradmin');
Route::get('unadmin/{id}','Admin\UserController@unadmin')->name('userunadmin');
// 
Route::post('ajax-close', ['as' => 'ajax-close', 'uses' => 'Admin\Shipping_ZoneController@OpenClose']);
});
//redirect to defult lang from yourdomain.com to yourdomain.com/en, 
//getcities
Route::get('City-list','Admin\CustomerController@getcities');
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
    //set lang 
    Route::get('setlang/{locale}', 'HomeController@set_lang');
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('/search','HomeController@search')->name('search');
    Route::get('about/{slug}','Front\PageController@about')->name('About');
    Route::get('page/{page}', 'Front\PageController@show')->name('page'); 
    Route::get('contact-us', 'Front\PageController@contactUS')->name('Contact');
    Route::post('contact-us', ['as'=>'contactus.store','uses'=>'Front\PageController@contactUSPost']);
    // show_profile
    Route::get('profile', 'Front\AccountController@show_profile')->name('Profile');
    Route::match(['put', 'patch'],'profile/{id}','Front\AccountController@update_profile')->name('account.update');
    // Route::get('products', 'Front\ProductController@index')->name('products');
    Route::get('category/{slug}', 'Front\ProductController@product_category')->name('category.products');
    Route::get('suncategory/{slug}', 'Front\ProductController@product_filters')->name('Subcategory.products');
    // product_details
   Route::get('products/{slug}', 'Front\ProductController@product_details')->name('product.name');
  //  subcategorylist
  Route::get('categories/{id}', 'Front\CategoryController@subcategorylist')->name('category.name');
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