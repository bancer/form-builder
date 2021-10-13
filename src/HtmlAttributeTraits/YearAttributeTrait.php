<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait YearAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $year;

    /**
     * By setting to false you can disable the generation of the year select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass year HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $year Year HTML attributes or `false`.
     * @return $this
     */
    public function year($year)
    {
        $this->year = $year;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'year';
        }
        return $this;
    }
}
