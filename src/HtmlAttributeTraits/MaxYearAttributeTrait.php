<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MaxYearAttributeTrait
{
    /**
     * @var int
     */
    protected $maxYear;

    /**
     * The maximum year to use in the year select.
     *
     * @param int $maxYear Maximum year.
     * @return $this
     */
    public function maxYear($maxYear)
    {
        $this->maxYear = $maxYear;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'maxYear';
        }
        return $this;
    }
}
