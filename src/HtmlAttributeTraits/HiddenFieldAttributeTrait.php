<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait HiddenFieldAttributeTrait
{
    /**
     * @var bool
     */
    protected $hiddenField;

    /**
     * Boolean to indicate if you want the results of checkbox() to include a hidden input with a value of ''.
     *
     * @param bool $hasHidden `true` of `false`.
     * @return $this
     */
    public function hiddenField($hasHidden)
    {
        $this->hiddenField = $hasHidden;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'hiddenField';
        }
        return $this;
    }
}
