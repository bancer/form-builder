<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;
use Bancer\FormBuilder\CheckBoxTag;

class CheckBoxTagTest extends TestCase
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

    public function testChecked()
    {
        $CheckBoxTag = new CheckBoxTag($this->FormHelper, 'done');
        $CheckBoxTag->checked();
        $expected = '<input type="hidden" name="done" value="0"/>
            <input type="checkbox" name="done" value="1" checked="checked">';
        $this->assertTextEquals($expected, $CheckBoxTag->__toString());
    }

    public function testHiddenField()
    {
        $CheckBoxTag = new CheckBoxTag($this->FormHelper, 'done');
        $CheckBoxTag->hiddenField(false);
        $expected = '<input type="checkbox" name="done" value="1">';
        $this->assertEquals($expected, $CheckBoxTag->__toString());
    }
}
