<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait LabelAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $label;

    /**
     * Either `false` to disable label around the widget or an array of attributes for the label tag.
     * `selected` will be added to any classes e.g. `'class' => 'myclass'` where widget is checked.
     *
     * @param bool|mixed[] $label Bool or array of labels.
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'label';
        }
        return $this;
    }
}
