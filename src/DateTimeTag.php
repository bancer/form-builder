<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\DayAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HourAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\IntervalAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MeridianAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MinuteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MonthNamesAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\OrderYearAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RoundAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SecondAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TimeFormatAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\YearAttributeTrait;

/**
 * Generates a set of SELECT elements for a full datetime setup: day, month and year, and then time.
 */
class DateTimeTag extends AbstractTag
{
    use DayAttributeTrait;
    use DefaultAttributeTrait;
    use EmptyAttributeTrait;
    use HourAttributeTrait;
    use IntervalAttributeTrait;
    use MaxYearAttributeTrait;
    use MeridianAttributeTrait;
    use MinYearAttributeTrait;
    use MinuteAttributeTrait;
    use MonthAttributeTrait;
    use MonthNamesAttributeTrait;
    use OrderYearAttributeTrait;
    use RoundAttributeTrait;
    use SecondAttributeTrait;
    use TimeFormatAttributeTrait;
    use ValueAttributeTrait;
    use YearAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates datetime widget.
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
     * Returns HTML of the datetime widget.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->dateTime($this->fieldName, $options);
    }
}
