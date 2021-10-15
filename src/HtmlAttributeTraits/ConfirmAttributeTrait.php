<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait ConfirmAttributeTrait
{
    /**
     * @var string
     */
    protected $confirm;

    /**
     * Confirm message to show. Form execution will only continue if confirmed then.
     *
     * @param string $confirm Confirm message.
     * @return $this
     */
    public function confirm($confirm)
    {
        $this->confirm = $confirm;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'confirm';
        }
        return $this;
    }
}
