<?php

namespace App\Infrastructure\Store;

use App\Domain\Store\Store;
use App\Domain\Store\StoreRepository;

class EloquentStoreRepository implements StoreRepository {
    public function all() {
         return Store::all();
    }

    public function find($id) {
        return Store::findOrFail($id);
    }

    public function create(array $data) {
        return Store::create($data);
    }

    public function update($id, array $data) {
        $store = Store::findOrFail($id);
        $store->update($data);
        return $store;
    }

    public function delete($id) {
        $store = Store::findOrFail($id);
        $store->delete();
        return true;
    }
}