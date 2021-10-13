<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait PlaceholderAttributeTrait
{
    /**
     * @var string
     */
    protected $placeholder;

    /**
     * Specifies a short hint that describes the expected value of an <input> element.
     *
     * @param string $placeholder Placeholder text.
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'placeholder';
        }
        return $this;
    }
}
