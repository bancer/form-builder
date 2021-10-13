<?php

namespace Bancer\FormBuilder\HtmlAttributeTraits;

trait MonthNamesAttributeTrait
{
    /**
     * @var bool|mixed[]
     */
    protected $monthNames;

    /**
     * If false, 2 digit numbers will be used instead of text for displaying months in the select picker.
     * If set to an array (e.g. ['01' => 'Jan', '02' => 'Feb', ...]), the given array will be used.
     *
     * @param bool|mixed[] $monthNames `false` or array of months.
     * @return $this
     */
    public function monthNames($monthNames)
    {
        $this->monthNames = $monthNames;
        if (isset($this->dirtyAttributes)) {
            $this->dirtyAttributes[] = 'monthNames';
        }
        return $this;
    }
}
