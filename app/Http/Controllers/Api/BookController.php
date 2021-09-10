<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UpdateBookRequest;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this -> bookRepository = $bookRepository;
    }

    public function index()
    {
        return response()->json(
            $this -> bookRepository -> all()
            , 200);
    }

    public function userBooks(Request $request)
    {
        $user_id = $request -> user() -> id;
        return response()->json(
            $this -> bookRepository -> getUserBooks($user_id)
            , 200);
    }

    public function store(StoreBookRequest $request)
    {
        if($this -> bookRepository ->create($request))
            return response() -> json(['message' => 'You are successfully added book'], 200);
    }
    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if($this -> bookRepository -> update($book, $request))
            return response() -> json(['message' => 'You are successfully update book'], 200);
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Book $book)
    {
        $this -> authorize('delete-book', $book);
        if($this -> bookRepository -> delete($book))
            return response() -> json(['message' => 'You are successfully delete book'], 200);
    }
}
