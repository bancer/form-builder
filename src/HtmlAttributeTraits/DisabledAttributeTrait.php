<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait DisabledAttributeTrait
{
    /**
     * @var string|mixed[]
     */
    protected $disabled;

    /**
     * Specifies that an <input> element should be disabled.
     *
     * @param string|mixed[] $disabled Control the disabled attribute. When creating a select box, set to true to
     * disable the select box. Set to an array to disable specific option elements.
     * @return $this
     */
    public function disabled($disabled)
    {
        $this->disabled = $disabled;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'disabled';
        }
        return $this;
    }
}
