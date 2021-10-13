<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait ColsAttributeTrait
{
    /**
     * @var int
     */
    protected $cols;

    /**
     * Specifies the visible width of a text area.
     *
     * @param int $cols Number of columns.
     * @return $this
     */
    public function cols($cols)
    {
        $this->cols = $cols;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'cols';
        }
        return $this;
    }
}
