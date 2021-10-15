<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\ConfirmAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DataAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\FormAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MethodAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

/**
 * Create a `<button>` tag with a surrounding `<form>` that submits via POST as default.
 */
class PostButtonTag extends AbstractTag
{
    use ConfirmAttributeTrait;
    use DataAttributeTrait;
    use DefaultAttributeTrait;
    use FormAttributeTrait;
    use MethodAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string
     */
    private $bTitle;

    /**
     * @var string|mixed[]
     */
    private $url;

    /**
     * Create a `<button>` tag with a surrounding `<form>` that submits via POST as default.
     *
     * This method creates a `<form>` element. So do not use this method in an already opened form.
     * Instead use FormHelper::submit() or FormHelper::button() to create buttons inside opened forms.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string $title The button's caption. Not automatically HTML encoded.
     * @param string|mixed[] $url URL as string or array.
     */
    public function __construct($FormHelper, $title, $url)
    {
        $this->FormHelper = $FormHelper;
        $this->bTitle = $title;
        $this->url = $url;
    }

    /**
     * Returns HTML of the post button element.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->postButton($this->bTitle, $this->url, $options);
    }
}
