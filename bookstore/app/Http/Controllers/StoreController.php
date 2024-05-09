<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\Store\StoreService;

class StoreController extends Controller {
    protected $storeService;

    public function __construct(StoreService $storeService) {
        $this->storeService = $storeService;
    }

    public function index() {
        return $this->storeService->getAllStores();
    }

    public function store(Request $request) {
        return $this->storeService->createStore($request->all());
    }

    public function update(Request $request, $id) {
        return $this->storeService->updateStore($id, $request->all());
    }

    public function destroy($id) {
        return $this->storeService->deleteStore($id);
    }
}