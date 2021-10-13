<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait ReadOnlyAttributeTrait
{
    /**
     * @var string
     */
    protected $readonly;

    /**
     * Specifies that an input field is read-only.
     *
     * @return $this
     */
    public function readOnly()
    {
        $this->readonly = 'readonly';
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'readonly';
        }
        return $this;
    }
}
