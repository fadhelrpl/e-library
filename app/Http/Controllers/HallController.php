<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $title = "Hall";
        $books = Book::all();

        return view('hall', compact('title', 'books'));
    }

    public function singleBook(Book $book)
    {
        $title = $book->name;
        return dd($book);
    }

    public function hallAuthor(Author $author)
    {
        $title = 'Books of ' . $author->name;
        $books = Book::where('author_id', $author->id)->get();
        return view('hall', compact('books', 'title'));
    }

    public function hallCategory(Category $category)
    {
        $title = 'Books of ' . $category->name;
        $books = Book::where('category_id', $category->id)->get();
        return view('hall', compact('books', 'title'));
    }
}
