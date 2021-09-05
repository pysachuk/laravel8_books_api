<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'pages_amount', 'annotation', 'image'];
    protected $hidden = ['pivot', 'user_id'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
