<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait TimeFormatAttributeTrait
{
    /**
     * @var int
     */
    protected $timeFormat;

    /**
     * Applies to dateTime() and time(). The time format to use in the select picker; either 12 or 24. When this option
     * is set to anything else than 24 the format will be automatically set to 12 and the meridian select picker will
     * be displayed automatically to the right of the seconds select picker. Defaults to 24.
     * Common for Time-Related Controls.
     *
     * @param int $timeFormat 12 or 24.
     * @return $this
     */
    public function timeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'timeFormat';
        }
        return $this;
    }
}
