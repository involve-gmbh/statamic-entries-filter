<?php

namespace Involve\StatamicEntriesFilter\Applicator;

use Illuminate\Http\Request;
use Involve\StatamicEntriesFilter\Filters\Source;
use Statamic\Http\Controllers\CP\Collections\EntriesController;

class FilterApplyingEntriesController extends EntriesController
{
    public function __construct(
        Request $request,
        private FilterApplicator $filterApplicator,
    ) {
        parent::__construct($request);
    }

    protected function indexQuery($collection)
    {
        $query = parent::indexQuery($collection);
        return $this->filterApplicator->applyFilters($collection, $query, Source::EntryCount);
    }
}
