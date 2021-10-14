<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AcceptAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\AutocompleteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\CheckedAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ColsAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DayAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormActionAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormEncTypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormMethodAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormNoValidateAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormTargetAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HiddenFieldAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HourAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\IntervalAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\LabelAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxLengthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MeridianAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinLengthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthNamesAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MultipleAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\OrderYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\PatternAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\PlaceholderAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RoundAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RowsAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TimeFormatAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\WrapAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\YearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinuteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SecondAttributeTrait;

/**
 * ControlTag generates a form control element complete with label and wrapper div.
 */
class ControlTag extends AbstractTag
{
    use AcceptAttributeTrait;
    use AutocompleteAttributeTrait;
    use AutofocusAttributeTrait;
    use CheckedAttributeTrait;
    use ColsAttributeTrait;
    use DayAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use EscapeAttributeTrait;
    use FormAttributeTrait;
    use FormActionAttributeTrait;
    use FormEncTypeAttributeTrait;
    use FormMethodAttributeTrait;
    use FormNoValidateAttributeTrait;
    use FormTargetAttributeTrait;
    use HiddenFieldAttributeTrait;
    use HourAttributeTrait;
    use IntervalAttributeTrait;
    use LabelAttributeTrait;
    use MaxLengthAttributeTrait;
    use MaxYearAttributeTrait;
    use MeridianAttributeTrait;
    use MinLengthAttributeTrait;
    use MinYearAttributeTrait;
    use MinuteAttributeTrait;
    use MonthAttributeTrait;
    use MonthNamesAttributeTrait;
    use MultipleAttributeTrait;
    use NameAttributeTrait;
    use OrderYearAttributeTrait;
    use PatternAttributeTrait;
    use PlaceholderAttributeTrait;
    use ReadOnlyAttributeTrait;
    use RoundAttributeTrait;
    use RowsAttributeTrait;
    use SecondAttributeTrait;
    use SizeAttributeTrait;
    use TimeFormatAttributeTrait;
    use TypeAttributeTrait;
    use ValAttributeTrait;
    use ValueAttributeTrait;
    use WrapAttributeTrait;
    use YearAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string|bool
     */
    protected $empty;

    /**
     * @var string|false
     */
    protected $error;

    /**
     * @var string|false|mixed[]
     */
    protected $label;

    /**
     * @var mixed[]|false
     */
    protected $labelOptions;

    /**
     * @var bool
     */
    protected $nestedInput;

    /**
     * @var mixed[]
     */
    protected $options;

    /**
     * @var bool
     */
    protected $required;

    /**
     * @var mixed[]
     */
    protected $templates;

    /**
     * Generates a form control element complete with label and wrapper div.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string $fieldName This should be "modelname.fieldname".
     */
    public function __construct($FormHelper, $fieldName)
    {
        $this->FormHelper = $FormHelper;
        $this->fieldName = $fieldName;
    }

    /**
     * Returns HTML of the form control element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        if (method_exists($this->FormHelper, 'control')) {
            return $this->FormHelper->control($this->fieldName, $options);
        } else {
            return $this->FormHelper->input($this->fieldName, $options);
        }
    }

    /**
     * String or boolean to enable empty select box options.
     *
     * @param string|bool $empty Empty value.
     * @return $this
     */
    public function empty($empty)
    {
        $this->empty = $empty;
        $this->dirtyAttributes[] = 'empty';
        return $this;
    }

    /**
     * Control the error message that is produced.
     * Set to `false` to disable any kind of error reporting (field error and error messages).
     *
     * @param string|false $error Error messages or `false`.
     * @return $this
     */
    public function error($error)
    {
        $this->error = $error;
        $this->dirtyAttributes[] = 'error';
        return $this;
    }

    /**
     * Either a string caption or an array of options for the label. You can set this to the string you would like
     * to be displayed within the label that usually accompanies the input HTML element.
     *
     * @param string|false|mixed[] $label Label or label options.
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;
        $this->dirtyAttributes[] = 'label';
        return $this;
    }

    /**
     * Either `false` to disable label around nestedWidgets e.g. radio, multicheckbox or an array
     * of attributes for the label tag.
     *
     * @param mixed[]|false $labelOptions Label options.
     * @return $this
     */
    public function labelOptions($labelOptions)
    {
        $this->labelOptions = $labelOptions;
        $this->dirtyAttributes[] = 'labelOptions';
        return $this;
    }

    /**
     * Used with checkbox and radio inputs. Set to false to render inputs outside of label elements.
     * Can be set to true on any input to force the input inside the label.
     * If you enable this option for radio buttons you will also need to modify the default `radioWrapper` template.
     *
     * @param bool $nestedInput `true` or `false`.
     * @return $this
     */
    public function nestedInput($nestedInput)
    {
        $this->nestedInput = $nestedInput;
        $this->dirtyAttributes[] = 'nestedInput';
        return $this;
    }

    /**
     * For widgets that take options e.g. radio, select.
     *
     * @param mixed[] $options Options values.
     * @return $this
     */
    public function options($options)
    {
        $this->options = $options;
        $this->dirtyAttributes[] = 'options';
        return $this;
    }

    /**
     * Generating specific elements via the control() form method will always also generate the wrapping div.
     * The wrapping div will have a required class name appended if the validation rules for the model’s field indicate
     * that it is required and not allowed to be empty. You can disable automatic required flagging using
     * the 'required' option.
     *
     * @param bool $required `false` to generate <div> withoud 'required' class.
     * @return $this
     */
    public function required($required)
    {
        $this->required = $required;
        $this->dirtyAttributes[] = 'required';
        return $this;
    }

    /**
     * The templates you want to use for this input. Any templates will be merged on top of
     * the already loaded templates. This option can either be a filename in /config that contains
     * the templates you want to load, or an array of templates to use.
     *
     * @param mixed[] $templates Templates.
     * @return $this
     */
    public function templates($templates)
    {
        $this->templates = $templates;
        $this->dirtyAttributes[] = 'templates';
        return $this;
    }
}
