<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait AutofocusAttributeTrait
{
    /**
     * @var string
     */
    protected $autofocus;

    /**
     * Specifies that an <input> element should automatically get focus when the page loads.
     *
     * @return $this
     */
    public function autofocus()
    {
        $this->autofocus = 'autofocus';
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'autofocus';
        }
        return $this;
    }
}
