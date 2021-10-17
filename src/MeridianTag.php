<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates a select element for AM or PM.
 */
class MeridianTag extends AbstractTag
{
    use DefaultAttributeTrait;
    use EmptyAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates a select element for AM or PM.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string $fieldName Prefix name for the SELECT element.
     */
    public function __construct($FormHelper, $fieldName)
    {
        $this->FormHelper = $FormHelper;
        $this->fieldName = $fieldName;
    }

    /**
     * Returns HTML of the select element for AM or PM.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->meridian($this->fieldName, $options);
    }
}
