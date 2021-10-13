<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait CheckedAttributeTrait
{
    /**
     * @var string
     */
    protected $checked;

    /**
     * Specifies that an <input> element should be pre-selected when the page loads
     * (for type="checkbox" or type="radio").
     *
     * @return $this
     */
    public function checked()
    {
        $this->checked = 'checked';
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'checked';
        }
        return $this;
    }
}
