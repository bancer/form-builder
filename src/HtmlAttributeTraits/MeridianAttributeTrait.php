<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MeridianAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $meridian;

    /**
     * By setting to false you can disable the generation of the meridian select picker (if by default it would
     * be rendered in the used method). In addition allows you to pass meridian HTML attributes.
     * Common for Date & Time Controls.
     *
     * @param bool|mixed[] $meridian Meridian HTML attributes or `false`.
     * @return $this
     */
    public function meridian($meridian)
    {
        $this->meridian = $meridian;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'meridian';
        }
        return $this;
    }
}
