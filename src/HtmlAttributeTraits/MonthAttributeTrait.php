<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MonthAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $month;

    /**
     * By setting to false you can disable the generation of the month select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass month HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $month Month HTML attributes or `false`.
     * @return $this
     */
    public function month($month)
    {
        $this->month = $month;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'month';
        }
        return $this;
    }
}
