<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait EscapeAttributeTrait
{
    /**
     * @var bool
     */
    protected $escape;

    /**
     * Whether or not the contents of should be escaped. Defaults to true.
     *
     * @param bool $escape `true` of `false`.
     * @return $this
     */
    public function escape($escape)
    {
        $this->escape = $escape;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'escape';
        }
        return $this;
    }
}
