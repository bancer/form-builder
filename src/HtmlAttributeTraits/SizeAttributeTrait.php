<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait SizeAttributeTrait
{
    /**
     * @var int
     */
    protected $size;

    /**
     * Specifies the width, in characters, of an <input> element.
     *
     * @param int $size Number of characters.
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'size';
        }
        return $this;
    }
}
