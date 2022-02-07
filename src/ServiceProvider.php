<?php

namespace Involve\StatamicEntriesFilter;

use Involve\StatamicEntriesFilter\Applicator\Entries;
use Involve\StatamicEntriesFilter\Applicator\FilterApplyingCollectionsController;
use Involve\StatamicEntriesFilter\Applicator\FilterApplyingEntriesController;
use Involve\StatamicEntriesFilter\Filters\FilterManager;
use Statamic\Fieldtypes\Entries as BaseEntries;
use Statamic\Http\Controllers\CP\Collections\CollectionsController;
use Statamic\Http\Controllers\CP\Collections\EntriesController;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    function register()
    {
        $this->app->bind(
            EntriesController::class,
            FilterApplyingEntriesController::class,
        );
        $this->app->bind(
            BaseEntries::class,
            Entries::class,
        );
        $this->app->bind(
            CollectionsController::class,
            FilterApplyingCollectionsController::class,
        );
        $this->app->singleton(FilterManager::class);
    }
}
