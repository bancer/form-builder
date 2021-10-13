<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait SecondAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $second;

    /**
     * By setting to false you can disable the generation of seconds select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass seconds HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $second Seconds HTML attributes or `false`.
     * @return $this
     */
    public function second($second)
    {
        $this->second = $second;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'second';
        }
        return $this;
    }
}
