<?php

namespace App\Repositories;

use App\Http\Requests\Api\UpdateBookRequest;
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

    public function getUserBooks($user_id)
    {
        return Book::where('user_id', $user_id)
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

    public function update(Book $book, UpdateBookRequest $request)
    {
        $data = $request -> only($book -> getFillable());
        $book -> fill($data);
        $author = Author::findOrFail($request -> author_id);
        $book -> authors() -> attach($author);
        return $book -> save();
    }

    public function delete(Book $book)
    {
        return $book -> delete();
    }
}
