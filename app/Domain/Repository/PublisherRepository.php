<?php

namespace App\Domain\Entity;

use \App\DataProvider\PublisherRepositoryInterface;
use \App\Models\Publisher as EloquentPublisher;
use \App\Domain\Entity\Publisher;

class PublisherRepository implements PublisherRepositoryInterface
{
    private $eloquentPublisher;

    public function __construct(EloquentPublisher $eloquentPublisher)
    {
        $this->eloquentPublisher = $eloquentPublisher;
    }

    public function findByName(string $name): ?Publisher
    {
        $record = $this->eloquentPublisher->whereName($name)->first();
        if ($record === null) {
            return null;
        }

        return new Publisher(
            $record->id,
            $record->name,
            $record->address
        );
    }

    public function store(Publisher $publisher): int
    {
        $eloquent = $this->eloquentPublisher->newInstance();
        $eloquent->name = $publisher->getName();
        $eloquent->address = $publisher->getAddress();
        $eloquent->save();
        return (int)$eloquent->id;
    }
}
