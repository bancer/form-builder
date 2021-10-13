<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait EmptyAttributeTrait
{
    /**
     * @var bool|string
     */
    protected $empty;

    /**
     * Set to `true` to create an input with the value '' as the first option. When `true`
     * the radio label will be 'empty'. Set this option to a string to control the label value.
     *
     * @param bool|string $empty Boolean for checkboxs, string for select widget.
     * @return $this
     */
    public function empty($empty)
    {
        $this->empty = $empty;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'empty';
        }
        return $this;
    }
}
