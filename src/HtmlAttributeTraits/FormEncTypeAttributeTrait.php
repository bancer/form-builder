<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait FormEncTypeAttributeTrait
{
    /**
     * @var string
     */
    protected $formenctype;

    /**
     * Specifies how the form-data should be encoded when submitting it to the server
     * (for type="submit" and type="image").
     *
     * @param string $formenctype 'application/x-www-form-urlencoded', 'multipart/form-data' or 'multipart/form-data'.
     * @return $this
     */
    public function formEncType($formenctype)
    {
        $this->formenctype = $formenctype;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'formenctype';
        }
        return $this;
    }
}
