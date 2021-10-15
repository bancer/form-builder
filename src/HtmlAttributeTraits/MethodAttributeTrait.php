<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MethodAttributeTrait
{

    /**
     * @var string
     */
    protected $method;

    /**
     * Allows you to explicitly override the form’s method.
     * Valid values:
     * 'get' - Will set the form method to HTTP GET.
     * 'file' - Will set the form method to POST and the 'enctype' to “multipart/form-data”.
     * 'post' - Will set the method to POST.
     * 'put', 'delete', 'patch' - Will override the HTTP method with PUT, DELETE or PATCH respectively,
     * when the form is submitted.
     *
     * @param string $method Value for the method attribute.
     * @return $this
     */
    public function method($method)
    {
        $this->method = $method;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'method';
        }
        return $this;
    }
}
