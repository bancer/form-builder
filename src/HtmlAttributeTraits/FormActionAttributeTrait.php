<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormActionAttributeTrait
{
    /**
     * @var string
     */
    protected $formaction;

    /**
     * Specifies the URL of the file that will process the input control when the form is submitted
     * (for type="submit" and type="image").
     *
     * @param string $formaction URL.
     * @return $this
     */
    public function formAction($formaction)
    {
        $this->formaction = $formaction;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'formaction';
        }
        return $this;
    }
}
