<?php

namespace Involve\StatamicEntriesFilter\Filters;

use Statamic\Entries\Collection;
use Statamic\Query\Builder;

class Context
{
    public function __construct(
        public readonly Collection $collection,
        public readonly Builder $query,
        public readonly Source $source,
    ) {
    }

    public function query(Builder $query): Context
    {
        return new Context(
            $this->collection,
            $query,
            $this->source,
        );
    }
}