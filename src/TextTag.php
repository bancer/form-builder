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
use Bancer\FormBuilder\HtmlAttributeTraits\PatternAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\PlaceholderAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * TextTag generates a simple input HTML element of text type.
 */
class TextTag extends AbstractTag
{
    use AutocompleteAttributeTrait;
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use FormAttributeTrait;
    use MaxLengthAttributeTrait;
    use MinLengthAttributeTrait;
    use NameAttributeTrait;
    use PatternAttributeTrait;
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
        return $this->FormHelper->text($this->fieldName, $options);
    }
}
