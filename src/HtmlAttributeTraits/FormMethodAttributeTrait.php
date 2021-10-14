<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormMethodAttributeTrait
{
    /**
     * @var string
     */
    protected $formmethod;

    /**
     * Defines the HTTP method for sending data to the action URL (for type="submit" and type="image").
     *
     * @param string $formmethod 'get' or 'post'.
     * @return $this
     */
    public function formMethod($formmethod)
    {
        $this->formmethod = $formmethod;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'formmethod';
        }
        return $this;
    }
}
