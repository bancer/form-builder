<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MinYearAttributeTrait
{
    /**
     * @var int
     */
    protected $minYear;

    /**
     * The lowest year to use in the year select.
     *
     * @param int $minYear Minimum year.
     * @return $this
     */
    public function minYear($minYear)
    {
        $this->minYear = $minYear;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'minYear';
        }
        return $this;
    }
}
