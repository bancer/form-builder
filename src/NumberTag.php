<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutocompleteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxLengthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinLengthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\PlaceholderAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates a number type input element.
 */
class NumberTag extends AbstractTag
{
    use AutocompleteAttributeTrait;
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use FormAttributeTrait;
    use MaxLengthAttributeTrait;
    use MinLengthAttributeTrait;
    use NameAttributeTrait;
    use PlaceholderAttributeTrait;
    use ReadOnlyAttributeTrait;
    use RequiredAttributeTrait;
    use SizeAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var int
     */
    protected $max;

    /**
     * @var int
     */
    protected $min;

    /**
     * @var int
     */
    protected $step;

    /**
     * Generates a number type input element.
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
     * Returns HTML of the number type input element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->number($this->fieldName, $options);
    }

    /**
     * Specifies the maximum value for an <input> element.
     *
     * @param int $max Maximum value.
     * @return $this
     */
    public function max($max)
    {
        $this->max = $max;
        $this->dirtyAttributes[] = 'max';
        return $this;
    }

    /**
     * Specifies a minimum value for an <input> element.
     *
     * @param int $min Minimum value.
     * @return $this
     */
    public function min($min)
    {
        $this->min = $min;
        $this->dirtyAttributes[] = 'min';
        return $this;
    }

    /**
     * Specifies the interval between legal numbers in an input field.
     *
     * @param int $step Step value.
     * @return $this
     */
    public function step($step)
    {
        $this->step = $step;
        $this->dirtyAttributes[] = 'step';
        return $this;
    }
}
