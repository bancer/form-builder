<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\CheckedAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HiddenFieldAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\LabelAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ReadOnlyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Creates a set of radio widgets.
 */
class RadioTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use CheckedAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use FormAttributeTrait;
    use HiddenFieldAttributeTrait;
    use LabelAttributeTrait;
    use NameAttributeTrait;
    use ReadOnlyAttributeTrait;
    use RequiredAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var mixed[]|\Traversable
     */
    protected $options;

    /**
     * An optional array containing at minimum the labels for the radio buttons. Can also contain values and HTML
     * attributes. When this array is missing, the method will either generate only the hidden input (if 'hiddenField'
     * is true) or no element at all (if 'hiddenField' is false).
     *
     * @param mixed[]|\Traversable $options Radio button options array.
     * @return $this
     */
    public function options($options)
    {
        $this->options = $options;
        // 'options' must NOT be added to $this->dirtyAttributes here.
        return $this;
    }

    /**
     * Creates a set of radio widgets.
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
        $attributes = $this->getOptions();
        return $this->FormHelper->radio($this->fieldName, $this->options, $attributes);
    }
}
