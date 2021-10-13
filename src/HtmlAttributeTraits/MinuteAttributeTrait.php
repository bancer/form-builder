<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MinuteAttributeTrait
{
    /**
     *
     * @var bool|mixed[]
     */
    protected $minute;

    /**
     * By setting to false you can disable the generation of the minute select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass minute HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $minute Minute HTML attributes or `false`.
     * @return $this
     */
    public function minute($minute)
    {
        $this->minute = $minute;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'minute';
        }
        return $this;
    }
}
