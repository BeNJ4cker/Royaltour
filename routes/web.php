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

/** Index Page **/
Route::get('/', 'UIViewController@ShowIndex');

/** Country Page **/
Route::get('/category/{country_id}', 'UIViewController@ShowCategory');

/** Aboutus Page **/
Route::get('/aboutus', 'UIViewController@ShowAboutus');

/** Admin Logout Process **/
Route::get('/logout-process', 'MemberController@LogoutProcess');

/** Tour Page **/
Route::get('/tour/{tour_id}', 'UIViewController@ShowTour')->name('show-tour');

/** Search Page **/
Route::get('/search-result', 'UIViewController@ShowSearchResult');

/** CountryCity search **/
Route::any('/city-country-search.do', 'TourSearchController@getCityOrCountryList');

/** Filter Page **/
Route::get('/filter-result', 'TourSearchController@getMatchingTours');

/** How to pay Page **/
Route::get('/how-to-pay', 'UIViewController@ShowHowToPay');

/** Contact us Page **/
Route::get('/contactus', 'UIViewController@ShowContactus');

/** Contact us Process **/
Route::post('contactus-process', 'ContactController@ContactProcess');


/** Article Page **/
Route::get('/article', 'UIViewController@ShowArticle');

/** Article Country Page **/
Route::get('/article/{article_category_id}', 'UIViewController@ShowArticleCategory');

/** Article Content Page **/
Route::get('/article/{article_category_id}/{article_id}', 'UIViewController@ShowArticleContent');

/** Gallery Page **/
Route::get('/gallery', 'UIViewController@ShowGallery');

/** Gallery Country Page **/
Route::get('/gallery/{country_id}', 'UIViewController@ShowGalleryCountry');

/** Reserve Tour Process **/
Route::post('/reserve-tour-process', 'ReserveTourController@ReserveTourProcess');

/***************************** Backend Page *********************************/





/* Admin Dashboard */
Route::group(['middleware' => ['role:admin|writer|addtour']], function () {
  Route::get('/admin', 'AdminUIController@ShowDashboard')->name('admin-dashboard');
});


// Admin Only

Route::group(['middleware' => ['role:admin']], function () {

  /**************************** All Airline Function **************************/

  /* Show Airline List */
  Route::get('/admin/admin-airline', 'AdminUIController@ShowAirline')->name('admin-airline');

  /* Show Create Airline */
  Route::get('/admin/admin-create-airline', 'AdminUIController@ShowCreateAirline');

  /* Create Airline Process */
  Route::post('/admin/admin-create-airline-process', 'AdminAirlineController@AdminCreateAirlineProcess')->middleware('optimizeImages');

  /* Show Edit Airline */
  Route::get('/admin/admin-edit-airline/{airline_id}', 'AdminUIController@ShowEditAirline');

  /* Edit Airline Process */
  Route::post('/admin/admin-edit-airline-process/{airline_id}', 'AdminAirlineController@AdminEditAirlineProcess')->middleware('optimizeImages');

  /* Delete Airline Process */
  Route::post('/admin/admin-delete-airline-process/{airline_id}', 'AdminAirlineController@AdminDeleteAirlineProcess');

  /**************************** End Airline Function **************************/

  /**************************** All Branch Function **************************/

  /* Show Branch List */
  Route::get('/admin/admin-branch', 'AdminUIController@ShowBranch')->name('admin-branch');

  /* Show Create Branch */
  Route::get('/admin/admin-create-branch', 'AdminUIController@ShowCreateBranch');

  /* Create Branch Process */
  Route::post('/admin/admin-create-branch-process', 'AdminBranchController@AdminCreateBranchProcess');

  /* Show Edit Branch */
  Route::get('/admin/admin-edit-branch/{branch_id}', 'AdminUIController@ShowEditBranch');

  /* Edit Branch Process */
  Route::post('/admin/admin-edit-branch-process/{branch_id}', 'AdminBranchController@AdminEditBranchProcess');

  /* Delete Branch Process */
  Route::post('/admin/admin-delete-branch-process/{branch_id}', 'AdminBranchController@AdminDeleteBranchProcess');

  /**************************** End Branch Function **************************/

  /**************************** All Staff Function **************************/

  /* Show Staff List */
  Route::get('/admin/admin-staff', 'AdminUIController@ShowStaff')->name('admin-staff');

  /* Show Create Staff */
  Route::get('/admin/admin-create-staff', 'AdminUIController@ShowCreateStaff');

  /* Create Branch Process */
  Route::post('/admin/admin-create-staff-process', 'AdminStaffController@AdminCreateStaffProcess')->middleware('optimizeImages');

  /* Show Edit Staff */
  Route::get('/admin/admin-edit-staff/{staff_id}', 'AdminUIController@ShowEditStaff');

  /* Edit Staff Process */
  Route::post('/admin/admin-edit-staff-process/{staff_id}', 'AdminStaffController@AdminEditStaffProcess')->middleware('optimizeImages');

  /* Delete Staff Process */
  Route::post('/admin/admin-delete-staff-process/{staff_id}', 'AdminStaffController@AdminDeleteStaffProcess');

  /**************************** End Staff Function **************************/

  /**************************** All Tour Function **************************/

  /* Show Tour List */
  Route::get('/admin/admin-tour', 'AdminUIController@ShowTour')->name('admin-tour');

  /* Show Tour CountryList */
  Route::get('/admin/admin-tour/{id}', 'AdminUIController@ShowCountryTour');

  /* Show Create Tour */
  Route::get('/admin/admin-create-tour', 'AdminUIController@ShowCreateTour');

  /* Create Tour Process */
  Route::post('/admin/admin-create-tour-process', 'AdminTourController@AdminCreateTourProcess')->middleware('optimizeImages');

  /* Show Edit Tour */
  Route::get('/admin/admin-edit-tour/{tour_id}', 'AdminUIController@ShowEditTour');

  /* Edit Tour Process */
  Route::post('/admin/admin-edit-tour-process/{tour_id}', 'AdminTourController@AdminEditTourProcess')->middleware('optimizeImages');

  /* Delete Tour Process */
  Route::post('/admin/admin-delete-tour-process/{tour_id}', 'AdminTourController@AdminDeleteTourProcess');

  /**************************** End Tour Function **************************/

  /**************************** All Slide Function **************************/

  /* Show Slide List */
  Route::get('/admin/admin-slide', 'AdminUIController@ShowSlide')->name('admin-slide');

  /* Show Create Slide */
  Route::get('/admin/admin-create-slide', 'AdminUIController@ShowCreateSlide');

  /* Create Slide Process */
  Route::post('/admin/admin-create-slide-process', 'AdminSlideController@AdminCreateSlideProcess')->middleware('optimizeImages');

  /* Show Edit Slide */
  Route::get('/admin/admin-edit-slide/{slide_id}', 'AdminUIController@ShowEditSlide')->middleware('optimizeImages');

  /* Edit Slide Process */
  Route::post('/admin/admin-edit-slide-process/{slide_id}', 'AdminSlideController@AdminEditSlideProcess');

  /* Delete Slide Process */
  Route::post('/admin/admin-delete-slide-process/{slide_id}', 'AdminSlideController@AdminDeleteSlideProcess');

  /**************************** End Slide Function **************************/


  /**************************** Other Page *********************************/

  /* Show Payment Page */
  Route::get('/admin/admin-payment', 'AdminUIController@ShowPaymentPage');

  /* Save Payment */
  Route::post('/admin-save-payment-page', 'AdminOtherPageController@SavePayment');

  /* Show Other Page */
  Route::get('/admin/admin-aboutus', 'AdminUIController@ShowAdminOtherPage');

  /* Save Aboutus Page */
  Route::post('/admin-save-aboutus-page', 'AdminOtherPageController@SaveAboutus');

  /* Show Contact Page */
  Route::get('/admin/admin-contact', 'AdminUIController@ShowAdminContactPage');

  /* Save Contact */
  Route::post('/admin-save-contact-page', 'AdminOtherPageController@SaveContact');

  /**************************** End Other Page *****************************/


  /**************************** All Tour Function **************************/

  /* Show Banner */
  Route::get('/admin/admin-banner', 'AdminUIController@ShowBanner');

  /* Save Banner */
  Route::post('/admin/admin-banner-save', 'AdminBannerController@AdminBannerSave')->middleware('optimizeImages');

  /**************************** End Tour Function **************************/



  /*************************** All Gallery Function ****************************/

  /* Show Gallery Page */
  Route::get('/admin/admin-gallery', 'AdminUIController@ShowGallery')->name('admin-gallery');

  /* Show Create Gallery Page */
  Route::get('/admin/admin-create-gallery', 'AdminUIController@ShowCreateGallery');

  /* Create Gallery Process */
  Route::post('/admin/admin-create-gallery-process', 'AdminGalleryController@AdminCreateGalleryProcess')->middleware('optimizeImages');

  /* Show Edit Gallery Page */
  Route::get('/admin/admin-edit-gallery/{gallery_id}', 'AdminUIController@ShowEditGallery');

  /* Edit Gallery Process */
  Route::post('/admin/admin-edit-gallery-process', 'AdminGalleryController@AdminEditGalleryProcess')->middleware('optimizeImages');

  /* Delete Gallery Process */
  Route::post('/admin/admin-delete-gallery-process/{gallery_id}', 'AdminGalleryController@AdminDeleteGalleryProcess');

  /************************* End Gallery Function *****************************/

  /************************* SEO Function *************************************/

  /* Show SEO Page */
  Route::get('/admin/admin-seo', 'AdminUIController@ShowSeo');

  /* Save SEO Information */
  Route::post('/admin/admin-seo-process', 'AdminSEOController@AdminSaveSEO');

  /************************* End SEO Function *************************************/

  /************************ Contact Info **************************************/

  /* Show Contact Info Page */
  Route::get('/admin/admin-contactinfo', 'AdminUIController@ShowContactInfo');

  /* Show Reserve Info Page */
  Route::get('/admin/admin-reserve-tour', 'AdminUIController@ShowReserveTour');

  /********************** End Contact Info ************************************/


  /*********************** Holiday Function *********************************/

  /* Show Holiday Page */
  Route::get('/admin/admin-holiday', 'AdminUIController@ShowHoliday')->name('admin-holiday');

  /* Show Create Holiday Page */
  Route::get('/admin/admin-create-holiday', 'AdminUIController@ShowCreateHoliday');

  /* Create Holiday Process */
  Route::post('/admin/admin-create-holiday-process', 'AdminHolidayController@AdminCreateHolidayProcess')->middleware('optimizeImages');

  /* Show Edit Holiday Page */
  Route::get('/admin/admin-edit-holiday/{holiday_id}', 'AdminUIController@ShowEditHoliday');

  /* Edit Holiday Process */
  Route::post('/admin/admin-edit-holiday-process', 'AdminHolidayController@AdminEditHolidayProcess')->middleware('optimizeImages');

  /* Delete Holiday Process */
  Route::post('/admin/admin-delete-holiday-process/{holiday_id}', 'AdminHolidayController@AdminDeleteHolidayProcess');

  /*********************** End Holiday Function ****************************/
});





// Add Tour

Route::group(['middleware' => ['role:admin|addtour']], function () {

  /**************************** All Continent Function **************************/

  /* Show Continent List */
  Route::get('/admin/admin-continent', 'AdminUIController@ShowContinent')->name('admin-continent');

  /* Show Create Continent */
  Route::get('/admin/admin-create-continent', 'AdminUIController@ShowCreateContinent');

  /* Create Continent Process */
  Route::post('/admin/admin-create-continent-process', 'AdminContinentController@AdminCreateContinentProcess')->middleware('optimizeImages');

  /* Show Edit Continent */
  Route::get('/admin/admin-edit-continent/{continent_id}', 'AdminUIController@ShowEditContinent');

  /* Edit Continent Process */
  Route::post('/admin/admin-edit-continent-process/{continent_id}', 'AdminContinentController@AdminEditContinentProcess')->middleware('optimizeImages');

  /* Delete Continent Process */
  Route::post('/admin/admin-delete-continent-process/{continent_id}', 'AdminContinentController@AdminDeleteContinentProcess');

  /**************************** End Continent Function **************************/





  /**************************** All Country Function **************************/

  /* Show Country List */
  Route::get('/admin/admin-country', 'AdminUIController@ShowCountry')->name('admin-country');

  /* Show Create country */
  Route::get('/admin/admin-create-country', 'AdminUIController@ShowCreateCountry');

  /* Create Country Process */
  Route::post('/admin/admin-create-country-process', 'AdminCountryController@AdminCreateCountryProcess')->middleware('optimizeImages');

  /* Show Edit Country */
  Route::get('/admin/admin-edit-country/{country_id}', 'AdminUIController@ShowEditCountry');

  /* Edit Country Process */
  Route::post('/admin/admin-edit-country-process/{country_id}', 'AdminCountryController@AdminEditCountryProcess')->middleware('optimizeImages');

  /* Delete Country Process */
  Route::post('/admin/admin-delete-country-process/{country_id}', 'AdminCountryController@AdminDeleteCountryProcess');

  /**************************** End Country Function **************************/


  /**************************** All City Function **************************/

  /* Show City List */
  Route::get('/admin/admin-city', 'AdminUIController@ShowCity')->name('admin-city');

  /* Show Create City */
  Route::get('/admin/admin-create-city', 'AdminUIController@ShowCreateCity');

  /* Create Country Process */
  Route::post('/admin/admin-create-city-process', 'AdminCityController@AdminCreateCityProcess')->middleware('optimizeImages');

  /* Show Edit City */
  Route::get('/admin/admin-edit-city/{city_id}', 'AdminUIController@ShowEditCity');

  /* Edit City Process */
  Route::post('/admin/admin-edit-city-process/{city_id}', 'AdminCityController@AdminEditCityProcess')->middleware('optimizeImages');

  /* Delete City Process */
  Route::post('/admin/admin-delete-city-process/{city_id}', 'AdminCityController@AdminDeleteCityProcess');

  /**************************** End City Function **************************/


  /********************* Tour Functions **********************************/

  Route::post('/admin/admin-add-tour', 'AdminAddTourController@AdminAddTourCreate');

  Route::get('/admin/admin-add-tour-step-1/{id}', 'AdminAddTourController@AdminAddTourStep1');

  Route::post('/admin/admin-add-tour-step-1/{id}', 'AdminAddTourController@AdminCreateTourStep1');

  Route::get('/admin/admin-add-tour-step-2/{id}', 'AdminAddTourController@AdminAddTourStep2');

  Route::post('/admin/admin-add-tour-step-2/{id}', 'AdminAddTourController@AdminCreateTourStep2');

  Route::get('/admin/admin-add-tour-step-3/{id}', 'AdminAddTourController@AdminAddTourStep3');

  Route::post('/admin/admin-add-tour-step-3/{id}', 'AdminAddTourController@AdminCreateTourStep3');

  Route::get('/admin/admin-add-tour-step-4/{id}', 'AdminAddTourController@AdminAddTourStep4');

  Route::post('/admin/admin-add-tour-step-4/{id}', 'AdminAddTourController@AdminCreateTourStep4');

  Route::get('/admin/admin-edit-tour-step/{id}', 'AdminEditTourController@AdminEditTourStep');

  Route::post('/admin/admin-edit-tour-step/{id}', 'AdminEditTourController@AdminUpdateTourStep');

  Route::get('/admin/admin-edit-tour-step-1/{id}', 'AdminEditTourController@AdminEditTourStep1');

  Route::post('/admin/admin-edit-tour-step-1/{id}', 'AdminEditTourController@AdminUpdateTourStep1');

  Route::get('/admin/admin-edit-tour-step-2/{id}', 'AdminEditTourController@AdminEditTourStep2');

  Route::post('/admin/admin-edit-tour-step-2/{id}', 'AdminEditTourController@AdminUpdateTourStep2');

  Route::get('/admin/admin-edit-tour-step-3/{id}', 'AdminEditTourController@AdminEditTourStep3');

  Route::post('/admin/admin-edit-tour-step-3/{id}', 'AdminEditTourController@AdminUpdateTourStep3');

  Route::get('/admin/admin-edit-tour-step-4/{id}', 'AdminEditTourController@AdminEditTourStep4');

  Route::post('/admin/admin-edit-tour-step-4/{id}', 'AdminEditTourController@AdminUpdateTourStep4');

  Route::get('/admin/admin-user', 'AdminUserController@ShowAllUser');

  Route::get('/admin/admin-create-user', 'AdminUserController@CreateUser');

  Route::get('/admin/admin-edit-user/{id}', 'AdminUserController@EditUser');

  Route::post('/admin/admin-store-user', 'AdminUserController@StoreUser');

  Route::post('/admin/admin-update-user/{id}', 'AdminUserController@UpdateUser');

  Route::post('/admin/admin-destroy-user', 'AdminUserController@DestroyUser');

  /********************* End Tour Functions **********************************/
});

// Writer

Route::group(['middleware' => ['role:admin|writer']], function () {

  /**************************** All Article Category Function **************************/



  /* Show Article Page */
  Route::get('/admin/admin-article-cat', 'AdminUIController@ShowAdminArticleCategoryPage')->name('admin-article-cat');

  /* Show Create Article Category Page */
  Route::get('/admin/admin-create-article-cat', 'AdminUIController@ShowCreateArticleCat');

  /* Create Article Category Process */
  Route::post('/admin/admin-create-articlecat-process', 'AdminArticleCatController@CreateArticleCatProcess')->middleware('optimizeImages');

  /* Show Edit Article Category Page */
  Route::get('/admin/admin-edit-article-cat/{articlecat_id}', 'AdminUIController@ShowEditArticleCat');

  /* Edit Article Category Process */
  Route::post('/admin/admin-edit-articlecat-process/{articlecat_id}', 'AdminArticleCatController@AdminEditArticleCatProcess')->middleware('optimizeImages');

  /* Delete Article Category Process */
  Route::post('/admin/admin-delete-article-cat-process/{articlecat_id}', 'AdminArticleCatController@AdminDeleteArticleCatProcess');


  /**************************** End Article Category Function **************************/


  /**************************** All Article Function **************************/

  /* Show Article Page */
  Route::get('/admin/admin-article', 'AdminUIController@ShowArticle')->name('admin-article');

  /* Show Create Article Page */
  Route::get('/admin/admin-create-article', 'AdminUIController@ShowCreateArticle');

  /* Create Article Process */
  Route::post('/admin/admin-create-article-process', 'AdminArticleController@AdminCreateArticleProcess')->middleware('optimizeImages');

  /* Show Edit Article Page */
  Route::get('/admin/admin-edit-article/{article_id}', 'AdminUIController@ShowEditArticle');

  /* Edit Article Process */
  Route::post('/admin/admin-edit-article-process/{article_id}', 'AdminArticleController@AdminEditArticleProcess')->middleware('optimizeImages');

  /* Delete Article Process */
  Route::post('/admin/admin-delete-article-process/{article_id}', 'AdminArticleController@AdminDeleteArticleProcess');


  /**************************** End All Article Function **************************/

  /**************************** All Website Setting Function *********************************** */

  /* Show Setting Page */
  Route::get('/admin/admin-setting', 'AdminSettingController@ShowSetting');

  Route::post('/admin/admin-edit-setting-1','AdminSettingController@EditSetting1');

  Route::post('/admin/admin-edit-setting-2','AdminSettingController@EditSetting2');
});


Auth::routes([
  'register' => false,
  'reset' => false
]);

Route::get('/home', function () {
  return redirect('/admin');
});
