<?php

namespace R64\Filters;

abstract class DateFilter extends CustomFilter
{
    /**
     * The name of the Vue component to be used for this filter
     *
     * @return string
     */
    protected function componentName()
    {
        return 'date-picker';
    }
}
