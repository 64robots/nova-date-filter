<?php

namespace R64\Filters;

abstract class DateFilter extends CustomFilter
{
	/**
     * Is the Date Filter is use for Date From.
     *
     * @var bool
     */
    public $is_date_from = false;

    /**
     * Is the Date Filter is use for Date To.
     *
     * @var bool
     */
    public $is_date_to = false;

    /**
     * Default options of Date.
     * 
     * @var array
     */
    public $options = [
		'dateFormat' => 'Y-m-d',
	];

    /**
     * Determine if the Date filter use for Date From.
     * 
     * @return boolean 
     */
    public function isDateFrom()
    {
        return $this->is_date_from;
    }

     /**
     * Determine if the Date filter use for Date To.
     * 
     * @return boolean 
     */
    public function isDateTo()
    {
        return $this->is_date_to;
    }

    /**
     * Get Date Operand.
     *
     * @return string
     */
    public function getOperand()
    {
        if ($this->isDateFrom()) {
            return '>=';
        }

        if ($this->isDateTo()) {
            return '<=';
        }

        return '=';
    }

    /**
     * Get Date Field From $date_field property.
     *
     * @return string
     */
    public function getDateField()
    {
        return $this->date_field;
    }

    /**
     * Get Date Options.
     * 
     * @return array
     */
    public function getOptions()
    {
    	return $this->options;
    }

    /**
     * Apply the filter to the given query.
     *
     * @param \Illuminate\Http\Request              $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed                                 $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where(
            $this->getDateField(),
            $this->getOperand(),
            $value
        );
    }

    /**
     * Get the filter's available options.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function options(Request $request)
    {
        return $this->getOptions();
    }

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
