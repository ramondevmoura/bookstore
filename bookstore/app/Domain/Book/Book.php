<?php

namespace App\Domain\Book;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Store\Store;


class Book extends Model {
    protected $fillable = ['name', 'isbn', 'value'];

    public function stores() {
        return $this->belongsToMany(Store::class);
    }
}