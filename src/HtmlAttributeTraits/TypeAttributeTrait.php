<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait TypeAttributeTrait
{
    /**
     * @var string
     */
    protected $type;

    /**
     * When used in the form tag allows you to choose the type of form to create.
     * If no type is provided then it will be autodetected based on the form context.
     * Valid values:
     * 'get' - Will set the form method to HTTP GET.
     * 'file' - Will set the form method to POST and the 'enctype' to “multipart/form-data”.
     * 'post' - Will set the method to POST.
     * 'put', 'delete', 'patch' - Will override the HTTP method with PUT, DELETE or PATCH respectively,
     * when the form is submitted.
     *
     * In the control widget forces the type of widget you want. e.g. `'select'`.
     *
     * In the submit element set to 'reset' for reset inputs. Defaults to 'submit'.
     *
     * @param string $type Element type.
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'type';
        }
        return $this;
    }
}
