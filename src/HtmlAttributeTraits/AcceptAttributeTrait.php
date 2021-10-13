<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait AcceptAttributeTrait
{
    /**
     * @var string
     */
    protected $accept;

    /**
     * Specifies a filter for what file types the user can pick from the file input dialog box (only for type="file").
     *
     * @param string $accept File extension, media type or 'audio/*', 'video/*', 'image/*'.
     * @return $this
     */
    public function accept($accept)
    {
        $this->accept = $accept;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'accept';
        }
        return $this;
    }
}
