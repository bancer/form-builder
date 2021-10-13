<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\HiddenFieldAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MultipleAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\RequiredAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\SizeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EmptyAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Generates dropdown widget.
 */
class SelectTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DisabledAttributeTrait;
    use EmptyAttributeTrait;
    use EscapeAttributeTrait;
    use FormAttributeTrait;
    use HiddenFieldAttributeTrait;
    use MultipleAttributeTrait;
    use NameAttributeTrait;
    use RequiredAttributeTrait;
    use SizeAttributeTrait;
    use ValAttributeTrait;
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
     * Array of the OPTION elements (as 'value'=>'Text' pairs) to be used in the SELECT element
     *
     * @param mixed[]|\Traversable $options Array of the OPTION elements (as 'value'=>'Text' pairs) to be used in the
     * SELECT element.
     * @return $this
     */
    public function options($options)
    {
        $this->options = $options;
        // 'options' must NOT be added to $this->dirtyAttributes here.
        return $this;
    }

    /**
     * Generates select widgets.
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
     * Returns HTML of the select element.
     *
     * @return string
     */
    public function __toString()
    {
        $attributes = $this->getOptions();
        return $this->FormHelper->select($this->fieldName, $this->options, $attributes);
    }
}
