<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ColsAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MaxLengthAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\PlaceholderAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RowsAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\WrapAttributeTrait;

/**
 * Creates a textarea widget.
 */
class TextAreaTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use ColsAttributeTrait;
    use EscapeAttributeTrait;
    use FormAttributeTrait;
    use MaxLengthAttributeTrait;
    use NameAttributeTrait;
    use PlaceholderAttributeTrait;
    use ReadOnlyAttributeTrait;
    use RequiredAttributeTrait;
    use RowsAttributeTrait;
    use ValueAttributeTrait;
    use WrapAttributeTrait;

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
     * Returns HTML of the textarea element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->textarea($this->fieldName, $options);
    }
}
