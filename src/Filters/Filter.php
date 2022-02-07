<?php

namespace Involve\StatamicEntriesFilter\Filters;

use Statamic\Query\Builder;

interface Filter
{
    public function shouldApply(Context $context): bool;

    public function apply(Context $context): Builder;
}
