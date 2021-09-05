<?php

namespace App\Repositories;
use App\Models\Author;

class AuthorRepository
{
    public function all()
    {
        return Author::select(['id', 'name', 'surname'])->get();
    }

    public function getAuthorBooks($author_id)
    {
        return Author::select(['id', 'name', 'surname'])
            -> with('books:id,title,pages_amount,annotation,image')
            -> where('id', $author_id)
            -> get();
    }
}
