<?php

namespace Bancer\FormBuilder;

use Bancer\FormBuilder\HtmlAttributeTraits\AutocompleteAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\NameAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\TemplateVarsAttribute;
use Bancer\FormBuilder\HtmlAttributeTraits\TypeAttributeTrait;
use Bancer\FormBuilder\HtmlAttributeTraits\MethodAttributeTrait;

/**
 * FormTag is responsible to building <form> tag with all necessary attributes.
 */
class FormTag extends AbstractTag
{
    use AutocompleteAttributeTrait;
    use MethodAttributeTrait;
    use NameAttributeTrait;
    use TemplateVarsAttribute;
    use TypeAttributeTrait;

    /**
     * @var mixed
     */
    private $mainContext;

    /**
     * @var mixed
     */
    protected $context;

    /**
     * @var string
     */
    protected $encoding;

    /**
     * @var string
     */
    protected $enctype;

    /**
     * @var string
     */
    protected $idPrefix;

    /**
     * @var string
     */
    protected $novalidate;

    /**
     * @var string
     */
    protected $rel;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var mixed
     */
    protected $templates;

    /**
     * @var mixed
     */
    protected $url;

    /**
     * @var mixed
     */
    protected $valueSources;

    /**
     * Constructor.
     *
     * @param \FormHelper|\Cake\View\Helper\FormHelper $FormHelper Reference to CakePHP FormHelper object.
     * @param mixed $context The context for which the form is being defined.
     * Can be a ContextInterface instance, ORM entity, ORM resultset, or an
     * array of meta data. You can use null to make a context-less form.
     */
    public function __construct($FormHelper, $context = null)
    {
        $this->FormHelper = $FormHelper;
        $this->mainContext = $context;
    }

    /**
     * Returns HTML with <form> tag.
     *
     * @return string
     */
    public function __toString()
    {
        $options = $this->getOptions();
        return $this->FormHelper->create($this->mainContext, $options);
    }

    /**
     * Additional options for the context class. For example the EntityContext accepts a 'table'
     * option that allows you to set the specific Table class the form should be based on.
     *
     * @param mixed $context
     * @return $this
     */
    public function context($context)
    {
        $this->context = $context;
        $this->dirtyAttributes[] = 'context';
        return $this;
    }

    /**
     * Set the accept-charset encoding for the form. Defaults to `Configure::read('App.encoding')`.
     *
     * @param string $encoding
     * @return $this
     */
    public function encoding($encoding)
    {
        $this->encoding = $encoding;
        $this->dirtyAttributes[] = 'encoding';
        return $this;
    }

    /**
     * Set the form encoding explicitly. By default `type => file` will set `enctype` to `multipart/form-data`.
     *
     * @param string $enctype
     * @return $this
     */
    public function enctype($enctype)
    {
        $this->enctype = $enctype;
        $this->dirtyAttributes[] = 'enctype';
        return $this;
    }

    /**
     * Prefix for generated ID attributes.
     *
     * @param string $idPrefix ID prefix.
     * @return $this
     */
    public function idPrefix($idPrefix)
    {
        $this->idPrefix = $idPrefix;
        $this->dirtyAttributes[] = 'idPrefix';
        return $this;
    }

    /**
     * Specifies that the form should not be validated when submitted.
     * @return $this
     */
    public function novalidate()
    {
        $this->novalidate = 'novalidate';
        $this->dirtyAttributes[] = 'novalidate';
        return $this;
    }

    /**
     * Specifies the relationship between a linked resource and the current document.
     *
     * @param string $rel Valid relationships: 'external', 'help', 'license', 'next', 'nofollow', 'noopener',
     * 'noreferrer', 'opener', 'prev', 'search'.
     * @return $this
     */
    public function rel($rel)
    {
        $this->rel = $rel;
        $this->dirtyAttributes[] = 'rel';
        return $this;
    }

    /**
     * Specifies where to display the response that is received after submitting the form.
     *
     * @param string $target Valid targets: '_blank', '_self', '_parent', '_top'.
     * @return $this
     */
    public function target($target)
    {
        $this->target = $target;
        $this->dirtyAttributes[] = 'target';
        return $this;
    }

    /**
     * The templates you want to use for this form. Any templates will be merged on top of
     * the already loaded templates. This option can either be a filename in /config that contains
     * the templates you want to load, or an array of templates to use.
     *
     * @param string|mixed[] $templates
     * @return $this
     */
    public function templates($templates)
    {
        $this->templates = $templates;
        $this->dirtyAttributes[] = 'templates';
        return $this;
    }

    /**
     * The URL the form submits to. Can be a string or a URL array.
     *
     * @param string|mixed[] $url Value for the action attribute.
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;
        $this->dirtyAttributes[] = 'url';
        return $this;
    }

    /**
     * The sources that values should be read from. See FormHelper::setValueSources()
     *
     * @param mixed $valueSources Value sources.
     * @return $this
     */
    public function valueSources($valueSources)
    {
        $this->valueSources = $valueSources;
        $this->dirtyAttributes[] = 'valueSources';
        return $this;
    }
}
