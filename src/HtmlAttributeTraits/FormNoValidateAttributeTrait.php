<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormNoValidateAttributeTrait
{
    /**
     * @var string
     */
    protected $formnovalidate;

    /**
     * Defines that form elements should not be validated when submitted.
     *
     * @return $this
     */
    public function formNoValidate()
    {
        $this->formnovalidate = 'formnovalidate';
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'formnovalidate';
        }
        return $this;
    }
}
