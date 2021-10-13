<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MultipleAttributeTrait
{
    /**
     * @var bool|string
     */
    protected $multiple;

    /**
     * Specifies that multiple options can be selected at once. If set to 'checkbox' multiple checkboxes will be
     *   created instead.
     *
     * @param bool|string $multiple bool or 'checkbox'.
     * @return $this
     */
    public function multiple($multiple)
    {
        $this->multiple = $multiple;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'multiple';
        }
        return $this;
    }
}
