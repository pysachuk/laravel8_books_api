<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuthorRepository;


class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this -> authorRepository = $authorRepository;
    }

    public function authors()
    {
        return response()->json(
            $this -> authorRepository -> all()
        , 200);
    }

    public function authorBooks($author_id)
    {
            return response()->json(
                $this -> authorRepository -> getAuthorBooks($author_id)
                , 200);
    }
}
