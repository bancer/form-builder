<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait TemplateVarsAttribute
{

    /**
     * @var mixed
     */
    protected $templateVars;

    /**
     * When used in form tag provide template variables for the formStart template.
     *
     * In the control widget and in the submit element - additional template variables for the input element
     * and its container.
     *
     * @param mixed $templateVars Template variables.
     * @return $this
     */
    public function templateVars($templateVars)
    {
        $this->templateVars = $templateVars;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'templateVars';
        }
        return $this;
    }
}
