<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutofocusAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DisabledAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormActionAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormEncTypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormMethodAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormNoValidateAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormTargetAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Creates a button element.
 */
class ButtonTag extends AbstractTag
{
    use AutofocusAttributeTrait;
    use DisabledAttributeTrait;
    use EscapeAttributeTrait;
    use FormActionAttributeTrait;
    use FormAttributeTrait;
    use FormEncTypeAttributeTrait;
    use FormMethodAttributeTrait;
    use FormNoValidateAttributeTrait;
    use FormTargetAttributeTrait;
    use NameAttributeTrait;
    use TypeAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string|null
     */
    private $caption;

    /**
     * @var string
     */
    protected $confirm;

    /**
     * Generates a button element.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string $title The button's caption. Not automatically HTML encoded.
     */
    public function __construct($FormHelper, $title)
    {
        $this->FormHelper = $FormHelper;
        $this->caption = $title;
    }

    /**
     * Returns HTML of the button element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->button($this->caption, $options);
    }

    /**
     * Confirm message to show. Form execution will only continue if confirmed then.
     *
     * @param string $confirm Confirm message.
     * @return \Bancer\FormBuilder\ButtonTag
     */
    public function confirm($confirm)
    {
        $this->confirm = $confirm;
        $this->dirtyAttributes[] = 'confirm';
        return $this;
    }
}
