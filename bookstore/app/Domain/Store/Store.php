<?php



namespace App\Domain\Store;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Book\Book;


class Store extends Model {
    protected $fillable = ['name', 'address', 'active'];

    public function books() {
        return $this->belongsToMany(Book::class);
    }

    public function addBook(Book $book) {
        $this->books()->attach($book->id);
    }

    public function removeBook(Book $book) {
        $this->books()->detach($book->id);
    }
}