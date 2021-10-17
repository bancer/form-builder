<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates label element.
 */
class LabelTag extends AbstractTag
{
    use DefaultAttributeTrait;
    use EscapeAttributeTrait;
    use FormAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    protected $for;

    /**
     * Generates label element.
     * Will automatically generate a `for` attribute if one is not provided.
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
        return $this->FormHelper->label($this->fieldName, $this->text, $options);
    }

    /**
     * Set the for attribute, if its not defined the for attribute will be generated from the $fieldName parameter
     * using FormHelper::_domId().
     *
     * @param string $for The id of the form element the label should be bound to.
     * @return $this
     */
    public function for($for)
    {
        $this->for = $for;
        $this->dirtyAttributes[] = 'for';
        return $this;
    }

    /**
     * Text that will appear in the label field.
     * If $text is left undefined the text will be inflected from the fieldName.
     *
     * @param string $text Label's text.
     * @return $this
     */
    public function text($text)
    {
        $this->text = $text;
        return $this;
    }
}
