<?php

namespace Involve\StatamicEntriesFilter\Filters;

use Statamic\Query\Builder;

class AbstractFilter implements Filter
{
    public function shouldApply(Context $context): bool
    {
        return true;
    }

    public function apply(Context $context): Builder
    {
        return $context->query;
    }
}