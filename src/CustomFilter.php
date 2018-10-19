<?php

namespace R64\Filters;

use Laravel\Nova\Filters\Filter;

abstract class CustomFilter extends Filter
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
            'component'       => $this->componentName(),
        ]);
    }

    /**
     * The name of the Vue component to be used for this filter
     *
     * @return string
     */
    protected abstract function componentName();
}
