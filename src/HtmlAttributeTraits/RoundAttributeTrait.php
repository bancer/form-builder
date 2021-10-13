<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait RoundAttributeTrait
{
    /**
     * @var string|null
     */
    protected $round;

    /**
     * Set to up or down if you want to force rounding minutes in either direction when the value doesn’t fit neatly
     * into an interval. Defaults to null.
     * Common for Time-Related Controls.
     *
     * @param string|null $round 'up' or 'down'.
     * @return $this
     */
    public function round($round)
    {
        $this->round = $round;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'round';
        }
        return $this;
    }
}
