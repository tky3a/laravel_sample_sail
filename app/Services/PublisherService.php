<?php

namespace App\Services;


use App\Models\Publisher;

class PublisherService
{
    public function exists(string $name): bool
    {
        $count = Publisher::where('name', $name)->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public function store(string $name, string $address): int
    {
        // レコード作成
        $publisher = Publisher::create([
            'name' => $name,
            'address' => $address,
        ]);
        // 作成したレコードのIDを返却
        return (int)$publisher->id;
    }
}
