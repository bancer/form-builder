<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DayAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthNamesAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MultipleAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\OrderYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\YearAttributeTrait;

/**
 * Generates date widget.
 */
class DateTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DayAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use FormAttributeTrait;
    use MinYearAttributeTrait;
    use MaxYearAttributeTrait;
    use MonthAttributeTrait;
    use MonthNamesAttributeTrait;
    use MultipleAttributeTrait;
    use NameAttributeTrait;
    use OrderYearAttributeTrait;
    use RequiredAttributeTrait;
    use SizeAttributeTrait;
    use ValueAttributeTrait;
    use YearAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates date input.
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
     * Returns HTML of the date input.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->date($this->fieldName, $options);
    }
}
