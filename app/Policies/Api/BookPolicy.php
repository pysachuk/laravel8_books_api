<?php

namespace App\Policies\Api;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(?User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    public function update(?User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }
}
