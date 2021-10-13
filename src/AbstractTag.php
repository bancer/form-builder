<?php

namespace Bancer\FormBuilder;

use Cake\View\StringTemplateTrait;

/**
 * AbstractTag contains properties and methods that are commont to any HTML tag.
 */
abstract class AbstractTag
{
    /**
     * Reference to CakePHP FormHelper.
     *
     * @var \FormHelper|\Cake\View\Helper\FormHelper
     */
    protected $FormHelper;

    /**
     * @var string
     */
    protected $accesskey;

    /**
     * @var string
     */
    protected $classes;

    /**
     * @var string
     */
    protected $contenteditable;

    /**
     * @var string
     */
    protected $dir;

    /**
     * @var string[]
     */
    protected $dirtyAttributes = [];

    /**
     * @var string
     */
    protected $draggable;

    /**
     * @var string
     */
    protected $hidden;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $spellcheck;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var int
     */
    protected $tabindex;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string[]
     */
    protected $attributes = [];

    /**
     * Specifies a shortcut key to activate/focus an element.
     *
     * @param string $accessKey
     * @return $this
     */
    public function accessKey($accessKey)
    {
        $this->accesskey = $accessKey;
        $this->dirtyAttributes[] = 'accesskey';
        return $this;
    }

    /**
     * Sets any HTML attribute.
     *
     * @param string $name HTML attribute name.
     * @param string $value HTML attribute value.
     * @return $this
     */
    public function attribute($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Specifies one or more classnames for an element (refers to a class in a style sheet).
     *
     * @param string $classes CSS class name(s).
     * @return $this
     */
    public function classes($classes)
    {
        $this->classes = $classes;
        $this->dirtyAttributes[] = 'classes';
        return $this;
    }

    /**
     * Specifies whether the content of an element is editable or not.
     *
     * @param string $contentEditable 'true' or 'false'.
     * @return $this
     */
    public function contentEditable($contentEditable)
    {
        $this->contenteditable = $contentEditable;
        $this->dirtyAttributes[] = 'contenteditable';
        return $this;
    }

    /**
     * Specifies the text direction for the content in an element.
     *
     * @param string $dir Direction 'ltr', 'rtl' or 'auto'.
     * @return $this
     */
    public function dir($dir)
    {
        $this->dir = $dir;
        $this->dirtyAttributes[] = 'dir';
        return $this;
    }

    /**
     * Specifies whether an element is draggable or not.
     *
     * @param string $draggable 'true', 'false' or 'auto'.
     * @return $this
     */
    public function draggable($draggable)
    {
        $this->draggable = $draggable;
        $this->dirtyAttributes[] = 'draggable';
        return $this;
    }

    /**
     * Specifies that an element is not yet, or is no longer, relevant.
     *
     * @return $this
     */
    public function hidden()
    {
        $this->hidden = 'hidden';
        $this->dirtyAttributes[] = 'hidden';
        return $this;
    }

    /**
     * Specifies a unique id for an element.
     *
     * @param string $id HTML element id.
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;
        $this->dirtyAttributes[] = 'id';
        return $this;
    }

    /**
     * Specifies the language of the element's content.
     *
     * @param string $language 2 letters language code.
     * @return $this
     */
    public function lang($language)
    {
        $this->lang = $language;
        $this->dirtyAttributes[] = 'lang';
        return $this;
    }

    /**
     * Specifies whether the element is to have its spelling and grammar checked or not.
     *
     * @param string $spellcheck 'true' or 'false'.
     * @return $this
     */
    public function spellcheck($spellcheck)
    {
        $this->spellcheck = $spellcheck;
        $this->dirtyAttributes[] = 'spellcheck';
        return $this;
    }

    /**
     * Specifies an inline CSS style for an element.
     *
     * @param string $style Inline styles.
     * @return $this
     */
    public function style($style)
    {
        $this->style = $style;
        $this->dirtyAttributes[] = 'style';
        return $this;
    }

    /**
     * Specifies the tabbing order of an element.
     *
     * @param int $tabIndex The tabbing order of the element (1 is first).
     * @return $this
     */
    public function tabIndex($tabIndex)
    {
        $this->tabindex = $tabIndex;
        $this->dirtyAttributes[] = 'tabindex';
        return $this;
    }

    /**
     * Specifies extra information about an element.
     *
     * @param string $title HTML element title.
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;
        $this->dirtyAttributes[] = 'title';
        return $this;
    }

    /**
     * Gets values of dirtry options.
     *
     * @return string[]
     */
    protected function getOptions()
    {
        $options = [];
        foreach ($this->dirtyAttributes as $name) {
            if ($name === 'classes') {
                $options['class'] = $this->classes;
            } else {
                $options[$name] = $this->{$name};
            }
        }
        $options += $this->attributes;
        return $options;
    }
}
