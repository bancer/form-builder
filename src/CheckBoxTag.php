<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\CheckedAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HiddenFieldAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Creates a checkbox input widget.
 */
class CheckBoxTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use CheckedAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use FormAttributeTrait;
    use HiddenFieldAttributeTrait;
    use NameAttributeTrait;
    use ReadOnlyAttributeTrait;
    use RequiredAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * Generates a simple input HTML element of text type.
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
     * Returns HTML of the text input element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        $checkbox = $this->FormHelper->checkbox($this->fieldName, $options);
        if (is_string($checkbox)) {
            return $checkbox;
        }
        return '';
    }
}
