<?php

namespace App\Http\Controllers\User;

use Auth;
use App\IssueBook;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookListController extends Controller
{
    public function getBooks()
    {
        return view('user.book.index')
        ->with('books', BookManagement::all());
    }

    public function issueBooks()
    {
        $issueBooks = IssueBook::where('user_id', Auth::user()->id)
        ->orderBy('return_date','desc')
        ->get();

        return view('user.issue.index')
            ->with('issue_books', $issueBooks);
    }
}
