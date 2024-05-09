<?php

namespace App\Infrastructure\Book;

use App\Domain\Book\Book;
use App\Domain\Book\BookRepository;

class EloquentBookRepository implements BookRepository {
    public function all() {
        return Book::all();
    }

    public function find($id) {
        return Book::findOrFail($id);
    }

    public function create(array $data) {
        return Book::create($data);
    }

    public function update($id, array $data) {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function delete($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return true;
    }
}