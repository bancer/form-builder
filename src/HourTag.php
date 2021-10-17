<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\IntervalAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MultipleAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RoundAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates select hours element.
 */
class HourTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use FormAttributeTrait;
    use IntervalAttributeTrait;
    use MultipleAttributeTrait;
    use NameAttributeTrait;
    use RequiredAttributeTrait;
    use RoundAttributeTrait;
    use SizeAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates select hours element.
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
     * Returns HTML of the select hours element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->hour($this->fieldName, $options);
    }
}
