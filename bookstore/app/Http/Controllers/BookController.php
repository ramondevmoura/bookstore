<?php

namespace App\Http\Controllers;

use App\Domain\Book\BookService as BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller {
    protected $bookService;
    

 
    public function __construct(BookService $bookService) {
        $this->bookService = $bookService;
    }

    public function index() {
         $books = $this->bookService->getAllBooks();
         return response()->json($books);
    }

    public function store(Request $request) {

        $rules = [
            'name' => 'required|string',
            'isbn' => 'required|numeric|unique:books',
            'value' => 'required|numeric',
            'store_ids' => 'required|numeric',
            'store_ids.*' => 'exists:stores,id' 
        ];

        $messages = [
            'isbn.numeric' => 'O ISBN deve ser um número.',
            'store_ids.array' => 'Stores must be provided as an id.',
            'store_ids.*.exists' => 'One or more selected stores do not exist.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ], 422); 
        }

        $book = $this->bookService->createBook($request->all());

        $storeIds = $request->input('store_ids');
        $book->stores()->attach($storeIds);

        return response()->json($book, 201);
        
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'isbn' => 'required|numeric|unique:books,isbn,' . $id,
            'value' => 'required|numeric',
        ];
    
        $messages = [
            'isbn.numeric' => 'O ISBN deve ser um número.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ], 422); 
        }
    
        return $this->bookService->updateBook($id, $request->all());
    }

    public function destroy($id) {
        return $this->bookService->deleteBook($id);
    }
}