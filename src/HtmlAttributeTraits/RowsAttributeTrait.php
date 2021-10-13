<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait RowsAttributeTrait
{
    /**
     * @var int
     */
    protected $rows;

    /**
     * Specifies the visible width of a text area.
     *
     * @param int $rows Number of rows.
     * @return $this
     */
    public function rows($rows)
    {
        $this->rows = $rows;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'rows';
        }
        return $this;
    }
}
