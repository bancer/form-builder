<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormTargetAttributeTrait
{
    /**
     * @var string
     */
    protected $formtarget;

    /**
     * Specifies where to display the response that is received after submitting the form
     * (for type="submit" and type="image").
     *
     * @param string $formtarget '_blank', '_self', '_parent', '_top' or framename.
     * @return $this
     */
    public function formTarget($formtarget)
    {
        $this->formtarget = $formtarget;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'formtarget';
        }
        return $this;
    }
}
