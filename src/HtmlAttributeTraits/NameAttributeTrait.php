<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait NameAttributeTrait
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Specifies the name of an element.
     *
     * @param string $name Name.
     * @return $this
     */
    public function name($name)
    {
        $this->name = $name;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'name';
        }
        return $this;
    }
}
