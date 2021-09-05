<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookRepository
{
    public function all()
    {
        return Book::select(['id', 'title', 'pages_amount', 'annotation', 'image', 'user_id'])
            -> with('authors:id,name,surname')
            -> with('user:id,name,email')
            -> get();
    }

    public function getUserBooks(Request $request)
    {
        return Book::where('user_id', $request -> user() -> id)
            -> select(['id', 'title', 'pages_amount', 'annotation', 'image', 'user_id'])
            -> with('authors:id,name,surname')
            -> get();
    }

    public function create(Request $request)
    {
        $book = new Book;
        $data = $request -> only($book -> getFillable());
        $data['user_id'] = $request -> user() -> id;
        $book -> fill($data);
        $book -> save();
        $author = Author::find($request -> author_id);
        $book -> authors() -> attach($author);
        return $book;
    }

    public function update(Book $book, Request $request)
    {
        $data = $request -> only($book -> getFillable());
        $book -> fill($data);
        return $book -> save();
    }

    public function delete(Book $book)
    {
        return $book -> delete();
    }
}
