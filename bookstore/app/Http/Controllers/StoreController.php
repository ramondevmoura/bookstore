<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Store\StoreService;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller {
    protected $storeService;

    public function __construct(StoreService $storeService) {
        $this->storeService = $storeService;
    }

    public function index() {
        $stores = $this->storeService->getAllStores();
        return response()->json($stores);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'active' => 'boolean',
        ]);

        $user = Auth::user(); 
        $data['user_id'] = $user->id; 

        $store = $this->storeService->createStore($data);
        return response()->json($store, 201);
    }

    public function update(Request $request, $id) {

        $rules = [
            'name' => 'required|string',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ], 422); 
        }
    
        return $this->storeService->updateStore($id, $request->all());
    }

    public function destroy($id) {
        $this->storeService->deleteStore($id);
        return response()->json(['message' => 'Store deleted']);
    }
}