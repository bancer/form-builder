<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\TextAreaTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class TextAreaTagTest extends TestCase
{
    use AssertTextTrait;

    /**
     * @var \Cake\View\Helper\FormHelper
     */
    private $FormHelper;

    public function setUp(): void
    {
        $View = new View();
        $this->FormHelper = new FormHelper($View);
    }

    public function testCustomTextarea()
    {
        $TextAreaTag = new TextAreaTag($this->FormHelper, 'notes');
        $TextAreaTag->cols(200)
            ->escape(false)
            ->rows(8)
            ->wrap('soft');
        $expected = '<textarea name="notes" cols="200" rows="8" wrap="soft"></textarea>';
        $this->assertTextEquals($expected, $TextAreaTag->__toString());
    }
}
