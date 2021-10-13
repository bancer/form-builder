<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormAttributeTrait
{
    /**
     * @var string
     */
    protected $form;

    /**
     * Specifies the form the <input> element belongs to.
     *
     * @param string $form
     * @return $this
     */
    public function form($form)
    {
        $this->form = $form;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'form';
        }
        return $this;
    }
}
