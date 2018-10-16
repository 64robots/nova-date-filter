<?php

namespace R64\Filters;

use Laravel\Nova\Filters\Filter;

abstract class DateFilter extends Filter
{
    /**
     * Prepare the filter for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'customComponent' => true,
            'component'       => 'date-picker',
        ]);
    }
}
