<?php

namespace App\Services;

use App\DataProvider\PublisherRepositoryInterface;
use App\Models\Publisher;

class PublisherService
{
    private $publisher;

    public function __construct(PublisherRepositoryInterface $publisher)
    {
        $this->publisher = $publisher;
    }

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
        return $this->publisher->store(new Publisher(null, $name, $address));
    }
}
