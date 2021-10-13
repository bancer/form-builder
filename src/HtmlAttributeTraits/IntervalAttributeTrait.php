<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait IntervalAttributeTrait
{
    /**
     * @var int
     */
    protected $interval;

    /**
     * The interval in minutes between the values which are displayed in the option elements of the minutes select
     * picker. Defaults to 1.
     * Common for Time-Related Controls.
     *
     * @param int $interval Number of minutes.
     * @return $this
     */
    public function interval($interval)
    {
        $this->interval = $interval;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'interval';
        }
        return $this;
    }
}
