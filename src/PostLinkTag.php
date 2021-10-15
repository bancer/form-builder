<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\ConfirmAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DataAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\DefaultAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\EscapeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MethodAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\ValueAttributeTrait;

class PostLinkTag extends AbstractTag
{
    use ConfirmAttributeTrait;
    use DataAttributeTrait;
    use DefaultAttributeTrait;
    use EscapeAttributeTrait;
    use MethodAttributeTrait;
    use ValueAttributeTrait;

    /**
     * @var string|null
     */
    private $caption;

    /**
     * @var string|mixed[]
     */
    private $url;

    /**
     * @var string|bool
     */
    protected $block;

    /**
     * Generates a post link element.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param string $title The content to be wrapped by <a> tags.
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
        return $this->FormHelper->postLink($this->caption, $this->url, $options);
    }

    /**
     * Cake-relative URL or array of URL parameters, or external URL (starts with http://).
     *
     * @param string|mixed[] $url URL.
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Set to true to append form to view block "postLink" or provide custom block name.
     *
     * @param string|bool $block `true` or block name.
     * @return $this
     */
    public function block($block)
    {
        $this->block = $block;
        $this->dirtyAttributes[] = 'block';
        return $this;
    }
}
