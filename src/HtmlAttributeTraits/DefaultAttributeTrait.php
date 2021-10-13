<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait DefaultAttributeTrait
{
    /**
     * @var string
     */
    protected $default;

    /**
     * Used to set a default value for the control field. The value is used if the data passed to the form does not
     * contain a value for the field (or if no data is passed at all).
     *
     * @param string $default Default value.
     * @return $this
     */
    public function default($default)
    {
        $this->default = $default;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'default';
        }
        return $this;
    }
}
