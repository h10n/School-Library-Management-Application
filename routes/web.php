<?php
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'GuestController@index');
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|staff']], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');        
        Route::resource('authors', 'AuthorsController');
        Route::resource('publishers', 'PublishersController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('books', 'BooksController');
        Route::resource('transactions', 'TransactionsController');
        Route::get('members/card/{id}', ['as' => 'members.card', 'uses' => 'MembersController@printCard']);
        Route::resource('members', 'MembersController');
        Route::resource('carousels', 'CarouselController');
        Route::resource('announcements', 'AnnouncementsController');
        Route::resource('visitors', 'VisitorsController');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
        Route::resource('users', 'UsersController');
        Route::get('export/transactions', ['as' => 'admin.export.transactions', 'uses' => 'ReportsController@transactionReport']);
        Route::post('reports/transactions/lihat', ['as' => 'admin.reports.transactions.lihat', 'uses' => 'ReportsController@lihatTransactionReport']);        
        Route::post('reports/transactions/lihat/tahun', ['as' => 'admin.reports.transactions.lihat.tahun', 'uses' => 'ReportsController@lihatTahunTransactionReport']);
        Route::post('reports/transactions/cetak', ['as' => 'admin.reports.transactions.cetak', 'uses' => 'ReportsController@cetakTransactions']);

        Route::get('export/visitors', ['as' => 'admin.export.visitors', 'uses' => 'ReportsController@visitorReport']);
        Route::post('reports/visitors/lihat', ['as' => 'admin.reports.visitors.lihat', 'uses' => 'ReportsController@lihatVisitorReport']);
        Route::post('reports/visitors/lihat/tahun', ['as' => 'admin.reports.visitors.lihat.tahun', 'uses' => 'ReportsController@lihatTahunVisitorReport']);
        Route::post('reports/visitors/cetak', ['as' => 'admin.reports.visitors.cetak', 'uses' => 'ReportsController@cetakVisitors']);
        
        Route::get('export', 'ReportsController@export')->name('admin.export');
        Route::post('export/cetak', 'ReportsController@printExport')->name('admin.export-cetak');
        
        Route::get('/settings/general', 'SettingsController@general');
        Route::get('/settings/general/edit', 'SettingsController@editGeneral');
        Route::put('/settings/general', 'SettingsController@updateGeneral');
    });

    Route::group(['prefix' => 'visitor', 'middleware' => ['auth', 'role:visitor']], function () {
        Route::post('guest-book', 'VisitorsController@storeGuestBook')->name('visitors.guest-book.store');
        Route::post('guest-book/member', 'VisitorsController@storeGuestBookMember')->name('visitors.guest-book-member.store');
        Route::get('guest-book', 'VisitorsController@guestBook')->name('visitors.guest-book');
    });

    Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function () {
        Route::get('status-history', 'MembersController@statusRiwayat')->name('members.status-history');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('users/profile', 'UsersController@profile')->name('users.profile');
        Route::get('users/password/edit', 'UsersController@editPassword')->name('users.password-edit');
        Route::post('users/password/update', 'UsersController@updatePassword')->name('users.password-update');
    });
});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'role:admin']);
Auth::routes();
