<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait WrapAttributeTrait
{
    /**
     * @var string
     */
    protected $wrap;

    /**
     * Specifies how the text in a text area is to be wrapped when submitted in a form.
     *
     * @param string $wrap 'hard' or 'soft'.
     * @return $this
     */
    public function wrap($wrap)
    {
        $this->wrap = $wrap;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'wrap';
        }
        return $this;
    }
}
