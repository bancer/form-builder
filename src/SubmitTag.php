<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormActionAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormEncTypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormMethodAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormNoValidateAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TemplateVarsAttribute;
use Bancer\FormBuilder\HtmlAttributeTraits\TypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormTargetAttributeTrait;

/**
 * SubmitTag creates a submit button element.
 */
class SubmitTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DefaultAttributeTrait;
    use DisabledAttributeTrait;
    use FormAttributeTrait;
    use FormActionAttributeTrait;
    use FormEncTypeAttributeTrait;
    use FormMethodAttributeTrait;
    use FormNoValidateAttributeTrait;
    use FormTargetAttributeTrait;
    use NameAttributeTrait;
    use TemplateVarsAttribute;
    use TypeAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string|null
     */
    private $caption;

    /**
     * Generates a submit button element.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string|null $caption The label appearing on the button OR if string contains :// or the
     *  extension .jpg, .jpe, .jpeg, .gif, .png use an image if the extension
     *  exists, AND the first character is /, image is relative to webroot,
     *  OR if the first character is not /, image is relative to webroot/img.
     */
    public function __construct($FormHelper, $caption = null)
    {
        $this->FormHelper = $FormHelper;
        $this->caption = $caption;
    }

    /**
     * Returns HTML of the text input element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->submit($this->caption, $options);
    }
}
