<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait DataAttributeTrait
{
    /**
     * @var mixed[]
     */
    protected $data;

    /**
     * Array with key/value to pass in hidden inputs.
     *
     * @param mixed[] $data Hidden input values.
     * @return $this
     */
    public function data($data)
    {
        $this->data = $data;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'data';
        }
        return $this;
    }
}
