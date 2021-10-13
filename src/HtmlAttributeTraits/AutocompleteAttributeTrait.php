<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait AutocompleteAttributeTrait
{
    /**
     * @var string
     */
    protected $autocomplete;

    /**
     * Specifies whether the element should have autocomplete on or off.
     *
     * @param string $autocomplete 'on' or 'off'.
     * @return $this
     */
    public function autocomplete($autocomplete)
    {
        $this->autocomplete = $autocomplete;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'autocomplete';
        }
        return $this;
    }
}
