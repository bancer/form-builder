<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait HourAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $hour;

    /**
     * By setting to false you can disable the generation of the hour select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass hour HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $hour Hour HTML attributes or `false`.
     * @return $this
     */
    public function hour($hour)
    {
        $this->hour = $hour;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'hour';
        }
        return $this;
    }
}
