<?php

namespace App\Domain\Store;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Book\Book;
use App\Models\User;


class Store extends Model {
    protected $fillable = ['name', 'address', 'active', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function books() {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    public function addBook(Book $book) {
        $this->books()->attach($book->id);
    }

    public function removeBook(Book $book) {
        $this->books()->detach($book->id);
    }
}