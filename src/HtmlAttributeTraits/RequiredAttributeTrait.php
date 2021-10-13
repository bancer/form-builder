<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait RequiredAttributeTrait
{
    /**
     * @var string
     */
    protected $required;

    /**
     * Specifies that an input field must be filled out before submitting the form.
     *
     * @return $this
     */
    public function required()
    {
        $this->required = 'required';
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'required';
        }
        return $this;
    }
}
