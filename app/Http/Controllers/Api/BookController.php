<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this -> bookRepository = $bookRepository;
    }

    public function all()
    {
        return response()->json(
            $this -> bookRepository -> all()
            , 200);
    }

    public function myBooks(Request $request)
    {
        return response()->json(
            $this -> bookRepository -> getUserBooks($request)
            , 200);
    }

    public function create(Request $request)
    {
        if($this -> bookRepository ->create($request))
            return response() -> json(['message' => 'You are successfully added book'], 200);
    }

    public function update(Book $book, Request $request)
    {
        if($this -> bookRepository -> update($book, $request))
            return response() -> json(['message' => 'You are successfully update book'], 200);
    }

    public function delete(Book $book)
    {
        if($this -> bookRepository -> delete($book))
            return response() -> json(['message' => 'You are successfully delete book'], 200);
    }
}
