<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait PatternAttributeTrait
{
    /**
     * @var string
     */
    protected $pattern;

    /**
     * Specifies a regular expression that an <input> element's value is checked against.
     *
     * @param string $pattern Pattern.
     * @return $this
     */
    public function pattern($pattern)
    {
        $this->pattern = $pattern;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'pattern';
        }
        return $this;
    }
}
