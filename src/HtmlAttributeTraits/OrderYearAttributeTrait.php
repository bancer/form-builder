<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait OrderYearAttributeTrait
{
    /**
     * @var string
     */
    protected $orderYear;

    /**
     * Order of year values in select options.
     *
     * @param string $orderYear Possible values 'asc', 'desc'. Default 'desc'.
     * @return $this
     */
    public function orderYear($orderYear)
    {
        $this->orderYear = $orderYear;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'orderYear';
        }
        return $this;
    }
}
