<?php

namespace Involve\StatamicEntriesFilter\Filters;

use Illuminate\Support\Collection;
use function app;

class FilterManager
{
    protected Collection $filters;

    public function __construct()
    {
        $this->filters = new Collection();
    }

    public function add(string|Filter $filter): void
    {
        if (is_string($filter))
            $filter = app($filter);

        $this->filters->add($filter);
    }

    /**
     * @return Collection<Filter>
     */
    public function filters(): Collection
    {
        return $this->filters;
    }
}