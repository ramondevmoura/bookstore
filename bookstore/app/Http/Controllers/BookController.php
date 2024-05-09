<?php

namespace App\Http\Controllers;

use App\Domain\Book\BookService as BookBookService;
use Illuminate\Http\Request;

class BookController extends Controller {
    protected $bookService;
    

 
    public function __construct(BookBookService $bookService) {
        $this->bookService = $bookService;
    }

    public function index() {
        return $this->bookService->getAllBooks();
    }

    public function store(Request $request) {
        return $this->bookService->createBook($request->all());
    }

    public function update(Request $request, $id) {
        print_r("caiu aqui");
        die();
        return $this->bookService->updateBook($id, $request->all());
    }

    public function destroy($id) {
        return $this->bookService->deleteBook($id);
    }
}