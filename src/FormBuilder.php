<?php

namespace Bancer\FormBuilder;

/**
 * FormBuilder wraps FormHelper.
 */
class FormBuilder
{
    /**
     * Reference to CakePHP FormHelper.
     *
     * @var \FormHelper|\Cake\View\Helper\FormHelper
     */
    private $FormHelper;

    /**
     * Constructor.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     */
    public function __construct($FormHelper)
    {
        $this->FormHelper = $FormHelper;
    }

    /**
     * Creates a checkbox input widget.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\CheckBoxTag
     */
    public function newCheckBox($fieldName)
    {
        return new CheckBoxTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a form control element complete with label and wrapper div.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\ControlTag
     */
    public function newControl($fieldName)
    {
        return new ControlTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates date widget.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\DateTag
     */
    public function newDate($fieldName)
    {
        return new DateTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a set of SELECT elements for a full datetime setup: day, month and year, and then time.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\DateTimeTag
     */
    public function newDateTime($fieldName)
    {
        return new DateTimeTag($this->FormHelper, $fieldName);
    }

    /**
     * Creates file input widget.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\FileTag
     */
    public function newFile($fieldName)
    {
        return new FileTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates HTML <form> tag.
     *
     * @param mixed $context The context for which the form is being defined.
     * Can be a ContextInterface instance, ORM entity, ORM resultset, or an
     * array of meta data. You can use null to make a context-less form.
     * @return \Bancer\FormBuilder\FormTag
     */
    public function newForm($context = null)
    {
        return new FormTag($this->FormHelper, $context);
    }

    /**
     * Generates a simple input HTML element of hidden type.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\HiddenTag
     */
    public function newHidden($fieldName)
    {
        return new HiddenTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a simple input HTML element of password type.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\PasswordTag
     */
    public function newPassword($fieldName)
    {
        return new PasswordTag($this->FormHelper, $fieldName);
    }

    /**
     * Creates a set of radio widgets.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\RadioTag
     */
    public function newRadio($fieldName)
    {
        return new RadioTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates dropdown widget.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\SelectTag
     */
    public function newSelect($fieldName)
    {
        return new SelectTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a simple input HTML element of text type.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\TextTag
     */
    public function newText($fieldName)
    {
        return new TextTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates textarea HTML element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\TextAreaTag
     */
    public function newTextArea($fieldName)
    {
        return new TextAreaTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates new time widget.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\TimeTag
     */
    public function newTime($fieldName)
    {
        return new TimeTag($this->FormHelper, $fieldName);
    }

    /*public function newButton()
    {
    }*/
}
