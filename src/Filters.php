<?php

namespace Involve\StatamicEntriesFilter;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Involve\StatamicEntriesFilter\Filters\Filter;
use Involve\StatamicEntriesFilter\Filters\FilterManager;

/**
 * @method static void add(string|Filter $filter)
 * @method static Collection filters()
 */
class Filters extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FilterManager::class;
    }
}
