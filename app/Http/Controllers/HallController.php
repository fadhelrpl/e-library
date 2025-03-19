<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $title = "Hall";
        $books = Book::all();

        return view('hall', compact('title', 'books'));
    }
}
