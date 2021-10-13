<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MaxLengthAttributeTrait
{
    /**
     * @var int
     */
    protected $maxlength;

    /**
     * Specifies the maximum number of characters allowed in an <input> element.
     *
     * @param int $maxLength Maximum characters.
     * @return $this
     */
    public function maxLength($maxLength)
    {
        $this->maxlength = $maxLength;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'maxlength';
        }
        return $this;
    }
}
