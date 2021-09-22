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
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'GuestController@index');
    Route::get('/tes', 'AuthorsController@tes');

    Route::get('books/{book}/borrow', [
    'middleware' => ['auth','role:member'],
    'as' => 'books.borrow',
    'uses' => 'BooksController@borrow'
  ]);
    Route::put('books/{book}/return', [
    'middleware' => ['auth','role:member'],
    'as' => 'books.return',
    'uses' => 'BooksController@returnBack'
  ]);
  
    Route::group(['prefix' => 'admin','middleware' => ['auth','role:admin']], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::get('template/books', [
      'as' => 'admin.template.books',
      'uses' => 'BooksController@generateExcelTemplate'
      ]);
        Route::post('import/books', [
        'as' => 'admin.import.books',
        'uses' => 'BooksController@importExcel'
      ]);
        Route::get('export/books', [
        'as' => 'admin.export.books',
        'uses' => 'BooksController@export'
      ]);
        Route::post('export/books', [
        'as' => 'admin.export.books.post',
        'uses' => 'BooksController@exportPost'
      ]);
        //useless
        Route::get('export/members/card/{card}', [
        'as' => 'admin.export.members.card',
        'uses' => 'MembersController@exportCard'
      ]);
        Route::resource('authors', 'AuthorsController');
        Route::resource('publishers', 'PublishersController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('books', 'BooksController');
        Route::resource('transactions', 'TransactionsController');


        Route::get('members/card/{id}', [
        'as' => 'members.card',
        'uses' => 'MembersController@printCard'
      ]);
      
        Route::resource('members', 'MembersController');

        Route::get('/settings/profile', 'SettingsController@profile');
        Route::get('/settings/general', 'SettingsController@general');
        Route::get('/settings/general/edit', 'SettingsController@editGeneral');
        Route::put('/settings/general', 'SettingsController@updateGeneral');
        Route::get('/settings/profile/edit', 'SettingsController@editProfile');
        Route::post('/settings/profile', 'SettingsController@updateProfile');
        Route::get('/settings/password', 'SettingsController@editPassword');
        Route::post('/settings/password', 'SettingsController@updatePassword');

        Route::get('export/visitors', [
        'as' => 'admin.export.visitors',
        'uses' => 'ReportsController@visitorReport' //< gk kedetek metod nya
      ]);
        Route::get('export/transactions', [
        'as' => 'admin.export.transactions',
        'uses' => 'ReportsController@transactionReport' //< gk kedetek metod nya
      ]);

        Route::post('reports/visitors/lihat', [
        'as' => 'admin.reports.visitors.lihat',
        'uses' => 'ReportsController@lihatVisitorReport'
      ]);
        Route::post('reports/transaction/lihat', [
        'as' => 'admin.reports.transaction.lihat',
        'uses' => 'ReportsController@lihatTransactionReport'
      ]);

        Route::post('reports/visitors/lihat/tahun', [
        'as' => 'admin.reports.visitors.lihat.tahun',
        'uses' => 'ReportsController@lihatTahunVisitorReport'
      ]);

        Route::post('reports/transaction/lihat/tahun', [
        'as' => 'admin.reports.transaction.lihat.tahun',
        'uses' => 'ReportsController@lihatTahunTransactionReport'
      ]);

        Route::post('reports/transactions/lihat/tahun', [
        'as' => 'admin.reports.transactions.lihat.tahun',
        'uses' => 'ReportsController@lihatTahunTransactionReport'
      ]);

        Route::post('reports/visitors/cetak', [
        'as' => 'admin.reports.visitors.cetak',
        'uses' => 'ReportsController@cetakVisitors'
      ]);

        Route::post('reports/transactions/cetak', [
        'as' => 'admin.reports.transactions.cetak',
        'uses' => 'ReportsController@cetakTransactions'
      ]);


        Route::get('export/books', [
  'as' => 'admin.export.books',
  'uses' => 'ReportsController@bookReport' //< gk kedetek metod nya
]);

        Route::post('reports/books/lihat', [
  'as' => 'admin.reports.books.lihat',
  'uses' => 'ReportsController@lihatBookReport' //< gk kedetek metod nya
]);

        Route::post('reports/books/lihat/tahun', [
  'as' => 'admin.reports.books.lihat.tahun',
  'uses' => 'ReportsController@lihatTahunBookReport' //< gk kedetek metod nya
]);


        Route::resource('carousels', 'CarouselController');// didalam akses admin
        Route::resource('announcements', 'AnnouncementsController');// didalam akses admin
        Route::resource('visitors', 'VisitorsController');// didalam akses admin
    });

    Route::group(['prefix' => 'visitor','middleware' => ['auth','role:visitor']], function () {
        Route::post('guest-book', 'VisitorsController@storeGuestBook')->name('visitors.guest-book.store');
        Route::get('guest-book', 'VisitorsController@guestBook')->name('visitors.guest-book');
    });

    Route::group(['prefix' => 'member','middleware' => ['auth','role:member']], function () {        
        Route::get('status-history', 'MembersController@statusRiwayat')->name('members.status-history');
    });
});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth','role:admin']);
Auth::routes();
