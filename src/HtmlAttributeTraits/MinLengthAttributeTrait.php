<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MinLengthAttributeTrait
{
    /**
     * @var int
     */
    protected $minlength;

    /**
     * Specifies the minimum number of characters required in an <input> element.
     *
     * @param int $minLength Minimum characters.
     * @return $this
     */
    public function minLength($minLength)
    {
        $this->minlength = $minLength;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'minlength';
        }
        return $this;
    }
}
