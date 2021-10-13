<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait ValAttributeTrait
{
    /**
     * @var string
     */
    protected $val;

    /**
     * Allows preselecting a value in the select picker.
     *
     * @param string $val The selected value of the input.
     * @return $this
     */
    public function val($val)
    {
        $this->val = $val;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'val';
        }
        return $this;
    }
}
