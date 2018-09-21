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

Route::get('/', 'FrontEndController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Url
Route::group(['prefix'=>'admin','middleware'=>['auth','IsAdmin']], function(){
    Route::resource('users', 'Admin\UsersController');
    Route::get('user/delete/{id}', 'Admin\UsersController@destroy')->name('user.destroy');
    Route::get('user/verify/{id}', 'Admin\UsersController@verify')->name('user.verify');
    Route::get('user/unverify/{id}', 'Admin\UsersController@unverify')->name('user.unverify');
    Route::get('user/admin/{id}', 'Admin\UsersController@admin')->name('user.admin');
    Route::get('user/general/{id}', 'Admin\UsersController@general')->name('user.general');

    // For unapproved users
    Route::get('user/unapprove', 'Admin\UsersController@getUnapprovedUser')->name('users.unapproved');

    // Categories
    Route::resource('category', 'Admin\CategoriesController');
    Route::get('category/books/{id}', 'Admin\CategoriesController@cat_books')->name('category.books');

    //Book self
    Route::resource('shelves', 'Admin\ShelvesController');
    Route::get('shelf/books/{id}', 'Admin\ShelvesController@shelf_books')->name('shelf.books');

    // Book mangement
    Route::resource('books', 'Admin\BooksManagementController');

    //Issue Book
    Route::get('book/{book_id}/issue', 'Admin\IssueController@issue')->name('book.issue');
    // Route::post('/email_available/check', 'Admin\BooksManagementController@check')->name('email_available.check');

    Route::resource('issue', 'Admin\IssueController');
    Route::get('issue/book/returned', 'Admin\IssueController@returned')->name('issue.returned');

    Route::get('issue/book_return/{id}', 'Admin\IssueController@book_returned')->name('book.return');
    Route::get('issue/book_pending/{id}', 'Admin\IssueController@book_pending')->name('book.pending');

    Route::get('book/user-email', 'Admin\BooksManagementController@check')->name('email_available.check');



});

// User Url
Route::group(['middleware'=>'auth'], function(){
    Route::get('book-list', 'User\BookListController@getBooks')->name('user.bookList');
    Route::get('issue-book-list', 'User\BookListController@issueBooks')->name('user.issueBooks');
    Route::get('issue-book-returned', 'User\BookListController@issueBooksReturned')->name('user.issueBooksReturned');
});
