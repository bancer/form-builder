<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait DayAttributeTrait
{
    /**
     *
     * @var bool|mixed[]
     */
    protected $day;

    /**
     * By setting to false you can disable the generation of the day select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass day HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $day Day HTML attributes or `false`.
     * @return $this
     */
    public function day($day)
    {
        $this->day = $day;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'day';
        }
        return $this;
    }
}
