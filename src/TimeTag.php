<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HourAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MeridianAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinuteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\IntervalAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RoundAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SecondAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TimeFormatAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates time widget.
 */
class TimeTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use FormAttributeTrait;
    use HourAttributeTrait;
    use IntervalAttributeTrait;
    use MeridianAttributeTrait;
    use MinuteAttributeTrait;
    use NameAttributeTrait;
    use RequiredAttributeTrait;
    use RoundAttributeTrait;
    use SecondAttributeTrait;
    use TimeFormatAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates a simple input HTML element of time type.
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
     * Returns HTML of the time input element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->time($this->fieldName, $options);
    }
}
