<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait ValueAttributeTrait
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Used to set a specific value for the control field.
     * This will override any value that may else be injected from the context.
     *
     * For checkboxes, it sets the HTML 'value' attribute assigned to the input element to whatever you provide as
     * value.
     *
     * For radio buttons or select pickers it defines which element will be selected when the form is rendered (in
     * this case 'value' must be assigned a valid, existent element value). May also be used in combination with any
     * select-type control, such as date(), time(), dateTime().
     *
     * The 'value' key for date() and dateTime() controls may also have as value a UNIX timestamp, or a DateTime object.
     *
     * For a select control where you set the 'multiple' attribute to true, you can provide an array with the values
     * you want to select by default.
     *
     * @param string $value Field value.
     * @return $this
     */
    public function value($value)
    {
        $this->value = $value;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'value';
        }
        return $this;
    }
}
