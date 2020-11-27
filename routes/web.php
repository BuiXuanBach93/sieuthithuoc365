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

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => ['admin']],function(){
    Route::get('home', 'AdminController@home')->name('admin_home');

    Route::resource('posts', 'PostController');
    Route::get('posts-show', 'PostController@anyDatatables')->name('datatable_post');
    Route::get('posts-visiable', 'PostController@visiable')->name('visable_post');

    Route::resource('pages', 'PageController');
    Route::get('pages-show', 'PageController@anyDatatables')->name('show_page');

    Route::resource('filter', 'FilterController');

    Route::resource('comments', 'CommentController');
    Route::get('comments-show', 'CommentController@anyDatatables')->name('datatable_comment');
    Route::post('comments-random', 'CommentController@randomCommentFromForm')->name('randomCommentFromForm');
    Route::get('comments-random', 'CommentController@randomComment')->name('randomComment');

    Route::resource('contact', 'ContactController');
    Route::get('contact-advisor', 'ContactController@listAdvisorContact')->name('contact-advisor');
    Route::get('contact-remarketing', 'ContactController@listRemarketingContact')->name('contact-remarketing');
    Route::get('contact-remarketing-done', 'ContactController@listRemarketingContactDone')->name('contact-remarketing-done');
    Route::get('contact-advisor-remarketing', 'ContactController@listAdvisorRemarketingContact')->name('contact-advisor-remarketing');
    Route::get('contact-advisor-remarketing-done', 'ContactController@listAdvisorRemarketingContactDone')->name('contact-advisor-remarketing-done');

    Route::get('contact-advisor', 'ContactController@listAdvisorContact')->name('contact-advisor');


    Route::get('show-contact-advisor/{contact}', 'ContactController@editAdvisorContact')->name('show-contact-advisor');
    Route::post('update-contact-advisor', 'ContactController@updateAdvisorContact')->name('updateContactAdvisor');
    Route::post('create-appointment', 'ContactController@createAppointment')->name('create-appointment');

    Route::resource('task', 'TaskController');
    Route::get('my-tasks', 'TaskController@listMyTask')->name('my-task');
    Route::get('show-my-task/{task}', 'TaskController@editMyTask')->name('show-my-task');
    Route::post('update-my-task', 'TaskController@updateMyTask')->name('update-my-task');

    Route::resource('cart-item', 'CartItemController');
    Route::delete('cart-item/{itemId}', 'CartItemController@destroy')->name('cart_item.destroy');
    Route::get('cart-item-report', 'CartItemController@cartItemReport')->name('cartItemReport');

    Route::resource('tracking-item', 'TrackingItemController');
    Route::delete('tracking-item/{itemId}', 'TrackingItemController@destroy')->name('tracking_item.destroy');

    Route::resource('products', 'ProductController');
    Route::get('products-show', 'ProductController@anyDatatables')->name('datatable_product');
    Route::get('export-products', 'ProductController@exportToExcel')->name('exportProducts');
    Route::post('import-products', 'ProductController@importToExcel')->name('importProducts');
    Route::post('get-product-getfly', 'ProductController@getProductGetfly')->name('getProductGetfly');

    Route::resource('templates', 'TemplateController');
    Route::resource('type-information', 'TypeInformationController');
    Route::resource('type-input', 'TypeInputController');
    Route::resource('type-sub-post', 'TypeSubPostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('category-products', 'CategoryProductController');
    Route::get('get-cate-product-getfly', 'CategoryProductController@getCateProductGetfly')->name('getCateProductGetfly');

    Route::group(['prefix' => '{typePost}'], function($typePost){
        // Files
        Route::resource('sub-posts', 'SubPostController');
        Route::get('sub-posts-show', 'SubPostController@anyDatatables')->name('datatable_sub_posts');
    });
    Route::resource('information', 'InformationController', ['only' => [
        'index', 'store'
    ]]);
    Route::get('information/general', 'InformationController@generalCreate')->name('information-general');
    Route::post('information/general-store', 'InformationController@generalStore')->name('information-store');

    Route::resource('menus', 'MenuController');
    Route::resource('users', 'UserController');

    Route::resource('subcribe-email', 'SubcribeEmailController');
    Route::get('subcribe-email-anyDatabase', 'SubcribeEmailController@anyDatatables')->name('subcribe-email-data');
    Route::post('group-mail/create', 'GroupMailController@store')->name('group_mail.create');
    Route::delete('group-mail/{groupMail}', 'GroupMailController@destroy')->name('group_mail.destroy');
    Route::post('send-mail', 'SubcribeEmailController@send')->name('subcribe-email_send');

    Route::get('hinh-thuc-thanh-toan', 'OrderController@setting')->name('method_payment');
    Route::post('cap-nhat-ngan-hang', 'OrderController@updateBank')->name('bank');
    Route::delete('quan-li-ngan-hang/{orderBanks}', 'OrderController@deleteBank')->name('orderBanks.destroy');
    Route::post('cap-nhat-ma-giam-gia', 'OrderController@updateCodeSale')->name('code_sale');
    Route::delete('quan-li-giam-gia/{orderCodeSales}', 'OrderController@deleteCodeSale')->name('orderCodeSales.destroy');

    Route::post('cap-nhat-phi-ship', 'OrderController@updateShip')->name('cost_ship');
    Route::post('cap-nhat-tinh-diem', 'OrderController@updateSetting')->name('updateSetting');
    Route::delete('quan-li-phi-ship/{orderShips}', 'OrderController@deleteShip')->name('orderShips.destroy');

    Route::post('cai-dat-getfly', 'OrderController@updateSettingGetFly')->name('updateSettingGetFly');
    Route::post('cau-hinh-email', 'OrderController@updateSettingEmail')->name('updateSettingEmail');
    Route::post('kiem-tra-cau-hinh', 'SettingController@testEmail')->name('testEmail');

    Route::get('don-hang', 'OrderController@listOrder')->name('orderAdmin');
    Route::get('export-exel','OrderController@exportToExcel')->name('exportToExcel');
    Route::delete('don-hang/{order}', 'OrderController@deleteOrder')->name('orderAdmin.destroy');
    Route::get('show-don-hang/{order}', 'OrderController@showOrder')->name('orderAdmin.show');
    Route::get('product-report', 'OrderController@productReport')->name('productReport');
    Route::get('order-stocker', 'OrderController@listOrderForStocker')->name('orderStocker');
    Route::get('show-order-stocker/{order}', 'OrderController@showOrderForStocker')->name('showOrderStocker');
    Route::post('update-order-stock', 'OrderController@updateOrderStock')->name('orderUpdateStock');
    Route::post('cap-nhat-trang-thai-don-hang', 'OrderController@updateStatusOrder')->name('orderUpdateStatus');

    Route::post('cap-nhat-thanh-tien-don-hang', 'OrderController@updatePriceOrder')->name('orderUpdatePrice');

    Route::get('thong-bao', 'ReportController@allreport')->name('report');
    Route::get('da-xem-thong-bao', 'ReportController@seenNotification')->name('seenNotification');
    Route::get('da-doc-thong-bao', 'ReportController@readNotification')->name('readNotification');
    Route::get('thong-bao-day', 'ReportController@pushNotification')->name('pushNotify');

    // quan ly domain and theme
    Route::resource('domains', 'DomainController');
    Route::get('domain-show', 'DomainController@anyDatatables')->name('datatable_domain');

    Route::resource('themes', 'ThemeController');
    Route::get('theme-show', 'ThemeController@anyDatatables')->name('datatable_theme');
    Route::get('active-theme', 'ThemeController@activeTheme')->name('active_theme');
    Route::post('change-theme', 'ThemeController@changeTheme')->name('change_theme');

    Route::resource('group-theme', 'GroupThemeController');
    Route::get('group-theme-show', 'GroupThemeController@anyDatatables')->name('datatable_group_theme');

    Route::resource('group-help-video', 'GroupHelpVideoController');
    Route::get('group-help-video-show', 'GroupHelpVideoController@anyDatatables')->name('datatable_group_help_video');

    Route::resource('help-video', 'HelpVideoController');
    Route::get('help-video-show', 'HelpVideoController@anyDatatables')->name('datatable_help_video');

    Route::post('upload-fanpage', 'PostFanpageController@uploadFanpage')->name('upload_fanpage');
    Route::get('comment-facebook', 'CommentFacebookController@pushComment')->name('comment_facebook');

    Route::post('update-groups', 'FanpageController@updateGroups')->name('update_groups');
    Route::post('update-face-id', 'FanpageController@updateFaceIds')->name('update_facebook_id');
    Route::get('delete-face-id', 'FanpageController@deleteFaceIds')->name('delete_facebook_id');
    Route::post('update-setting-face', 'FanpageController@updateSetting')->name('update_setting_face');
    Route::get('get-post-facebook', 'FanpageController@index')->name('get_post_facebook');


    Route::get('get-uid', 'FacebookUidController@getUid')->name('get_uid');
    Route::get('show-get-uid', 'FacebookUidController@showGetUid')->name('show_get_uid');

    Route::get('show-convert-uid', 'FacebookConvertController@showConvertFromUid')->name('show_convert_uid');
    Route::get('convert-uid', 'FacebookConvertController@convertFromUid')->name('convert_uid');
    Route::post('get-uid-from-excel', 'FacebookConvertController@getUidFromExcel')->name('get_uid_from_excel');

    Route::get('show-request-friend', 'FacebookConvertController@showRequestFriend')->name('show_request_friend');
    Route::get('request-friend', 'FacebookConvertController@requestFriend')->name('request_friend');

    Route::get('download-member', 'FacebookUidController@showMembers')->name('download-member');

});

//dang nhap
Route::group(['prefix'=>'admin', 'namespace'=>'Admin' ],function(){
    Route::get('/','LoginController@showLoginForm');
    Route::get('login','LoginController@showLoginForm')->name('login');
    Route::post('login','LoginController@login');
    Route::get('logout','LoginController@logout');
    Route::post('logout','LoginController@logout')->name('logout');
    //reset password
    Route::get('password/reset','LoginController@getReset');
    Route::post('password/reset','LoginController@postReset');
});

Route::group(['namespace'=>'Site'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/update-campaign', 'PostController@updateCampaign')->name('updateCampaign');
    Route::get('/update-banner-ads', 'PostController@updateBannerAds')->name('updateBannerAds');
    Route::get('/tracking-cart', 'OrderController@trackingCart')->name('trackingCart');
    Route::get('/hot-deal', 'ProductCategoryController@index');
    Route::get('/danh-muc/{cate_slug}', 'CategoryController@index')->name('site_category_post');
    Route::get('/cua-hang/{cate_slug}', 'ProductCategoryController@index')->name('site_category_product');
    Route::get('/tim-kiem', 'ProductCategoryController@search')->name('search_product');
    Route::get('/tim-kiem-thuong-hieu', 'ProductCategoryController@searchBrand')->name('search_product_brand');
    Route::get('/tim-kiem-ajax', 'ProductCategoryController@searchAjax')->name('search_product_ajax');
    Route::get('rating', 'ProductController@Rating')->name('rating');
    Route::get('/customer-notify', 'ProductCategoryController@getNotificationData')->name('getNotificationData');
    Route::get('/banner-ads', 'ProductController@getBannerAdsData')->name('getBannerAdsData');
    Route::get('/campaigns', 'ProductController@getCampaignData')->name('getCampaignData');

    Route::get('/bo-sung/{sub_post_slug}', 'SubPostController@index');

    Route::get('/dang-ky','RegisterController@showRegistrationForm')->name('register');
    Route::post('/dang-ky','RegisterController@register');

    Route::post('/quen-mat-khau','PersonController@forgetPassword')->name('forget_password');
    Route::post('/dang-nhap','LoginController@login');
    Route::get('dang-xuat','LoginController@logout');
    Route::post('dang-xuat','LoginController@logout')->name('logoutHome');
    Route::get('cblogin','LoginController@callbackLogin');

    Route::get('login/google', 'LoginController@redirectToProvider')->name('google_login');
    Route::get('login/google/callback', 'LoginController@handleProviderCallback');

    Route::get('/thong-tin-ca-nhan','PersonController@index');
    Route::post('/thong-tin-ca-nhan','PersonController@store');
    Route::get('/doi-mat-khau','PersonController@resetPassword');
    Route::post('/doi-mat-khau','PersonController@storeResetPassword');
    Route::get('/don-hang-ca-nhan','PersonController@orderPerson')->name('orderPerson');

    Route::get('/lien-he','ContactController@index');
    Route::post('submit/contact','ContactController@submit')->name('sub_contact');
    
    Route::get('/binh-luan', 'CommentController@index')->name('comment');
    Route::get('/xoa-binh-luan', 'CommentController@delete')->name('delete_comment');
    Route::get('/sua-binh-luan', 'CommentController@edit')->name('edit_comment');
    Route::get('/binh-luan-moi', 'CommentController@virtural')->name('virtural_comment');

    Route::get('loc-san-pham', 'ProductCategoryController@filter');

    Route::get('/tags', 'SubPostController@tags')->name('tags_product');

    /*===== đặt hàng  ===== */
    Route::post('/dat-hang', 'OrderController@addToCart')->name('addToCart');
    Route::get('/gio-hang', 'OrderController@order')->name('order');
    Route::get('/xoa-don-hang', 'OrderController@deleteItemCart')->name('deleteItemCart');

    Route::post('/gui-don-hang', 'OrderController@send')->name('send');

    /*===== subcribe email   ===== */
    Route::post('subcribe-email', 'SubcribeEmailController@index')->name('subcribe_email');

    Route::get('sitemap.xml', 'SitemapsController@index');
    Route::get('trang/{post_slug}', 'PageController@index')->name('page');
    Route::get('{cate_slug}/{post_slug}', 'PostController@index')->name('post');
    Route::get('{post_slug}', 'ProductController@index')->name('product');
});
