<?php

namespace Involve\StatamicEntriesFilter\Applicator;

use Illuminate\Support\Collection;
use Involve\StatamicEntriesFilter\Filters\Context;
use Involve\StatamicEntriesFilter\Filters\Source;
use Involve\StatamicEntriesFilter\Filters\Filter;
use Involve\StatamicEntriesFilter\Filters\FilterManager;
use Statamic\Entries\Collection as EntriesCollection;
use Statamic\Query\Builder;

class FilterApplicator
{
    public function __construct(
        protected readonly FilterManager $filterManager,
    ) {
    }

    public function applyFilters(EntriesCollection $collection, Builder $originalQuery, Source $source): Builder
    {
        $filters = $this->filterManager->filters();
        $context = $this->getContext($collection, $originalQuery, $source);
        return $this->applyAll($filters, $context);
    }

    protected function applyAll(Collection $filters, Context $context): Builder
    {
        return $filters->reduce(
            fn($query, $filter) => $this->apply($filter, $context->query($query)),
            $context->query,
        );
    }

    protected function apply(Filter $filter, Context $context): Builder
    {
        if ($filter->shouldApply($context))
            return $filter->apply($context);
        else
            return $context->query;
    }

    protected function getContext(EntriesCollection $collection, Builder $originalQuery, Source $context): Context
    {
        return new Context(
            $collection,
            $originalQuery,
            $context,
        );
    }
}
