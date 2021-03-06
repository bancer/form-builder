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
     * Closes an HTML form, cleans up values set by FormHelper::create(), and writes hidden
     * input fields where appropriate.
     *
     * Resets some parts of the state, shared among multiple FormHelper::create() calls, to defaults.
     *
     * @param mixed[] $secureAttributes Secure attributes which will be passed as HTML attributes
     *   into the hidden input elements generated for the Security Component.
     * @return string A closing FORM tag.
     */
    public function end($secureAttributes = [])
    {
        return $this->FormHelper->end($secureAttributes);
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

    /**
     * Generates select year element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\YearTag
     */
    public function newYear($fieldName)
    {
        return new YearTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates select month element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\MonthTag
     */
    public function newMonth($fieldName)
    {
        return new MonthTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates select day element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\DayTag
     */
    public function newDay($fieldName)
    {
        return new DayTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates select hours element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\HourTag
     */
    public function newHour($fieldName)
    {
        return new HourTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a select element for minutes.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\MinuteTag
     */
    public function newMinute($fieldName)
    {
        return new MinuteTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a select element for AM or PM.
     *
     * @param string $fieldName Prefix name for the SELECT element.
     * @return \Bancer\FormBuilder\MeridianTag
     */
    public function newMeridian($fieldName)
    {
        return new MeridianTag($this->FormHelper, $fieldName);
    }

    /**
     * Creates a submit button element. This method will generate `<input />` elements that
     * can be used to submit, and reset forms by using $options. Image submits can be created by supplying an
     * image path for $caption.
     *
     * @param string|null $caption The label appearing on the button OR if string contains :// or the
     * extension .jpg, .jpe, .jpeg, .gif, .png use an image if the extension
     * exists, AND the first character is /, image is relative to webroot,
     * OR if the first character is not /, image is relative to webroot/img.
     * @return \Bancer\FormBuilder\SubmitTag
     */
    public function newSubmit($caption = null)
    {
        return new SubmitTag($this->FormHelper, $caption);
    }

    /**
     * Creates a button element.
     *
     * @param string $title The button's caption. Not automatically HTML encoded.
     * @return \Bancer\FormBuilder\ButtonTag
     */
    public function newButton($title)
    {
        return new ButtonTag($this->FormHelper, $title);
    }

    /**
     * Create a `<button>` tag with a surrounding `<form>` that submits via POST as default.
     *
     * This method creates a `<form>` element. So do not use this method in an already opened form.
     * Instead use FormHelper::submit() or FormHelper::button() to create buttons inside opened forms.
     *
     * @param string $title The button's caption. Not automatically HTML encoded.
     * @param string|mixed[] $url URL as string or array.
     * @return \Bancer\FormBuilder\PostButtonTag
     */
    public function newPostButton($title, $url)
    {
        return new PostButtonTag($this->FormHelper, $title, $url);
    }

    /**
     * Creates an HTML link, but access the URL using the method you specify
     * (defaults to POST). Requires javascript to be enabled in browser.
     *
     * This method creates a `<form>` element. If you want to use this method inside of an
     * existing form, you must use the `block` option so that the new form is being set to
     * a view block that can be rendered outside of the main form.
     *
     * If all you are looking for is a button to submit your form, then you should use
     * `newButton()` or `newSubmit()` instead.
     *
     * @param string $title The content to be wrapped by <a> tags.
     * @return \Bancer\FormBuilder\PostLinkTag
     */
    public function newPostLink($title)
    {
        return new PostLinkTag($this->FormHelper, $title);
    }

    /**
     * Generates label element.
     * Will automatically generate a `for` attribute if one is not provided.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\LabelTag
     */
    public function newLabel($fieldName)
    {
        return new LabelTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates a number type input element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\NumberTag
     */
    public function newNumber($fieldName)
    {
        return new NumberTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates an email type input element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\EmailTag
     */
    public function newEmail($fieldName)
    {
        return new EmailTag($this->FormHelper, $fieldName);
    }

    /**
     * Generates search input element.
     *
     * @param string $fieldName This should be "modelname.fieldname".
     * @return \Bancer\FormBuilder\SearchTag
     */
    public function newSearch($fieldName)
    {
        return new SearchTag($this->FormHelper, $fieldName);
    }
}
