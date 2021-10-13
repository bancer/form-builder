<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\SelectTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class SelectTagTest extends TestCase
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

    public function testMultiple()
    {
        $SelectTag = new SelectTag($this->FormHelper, 'rooms');
        $SelectTag->options([1, 2, 3, 4, 5])
            ->multiple(true)
            ->value([1, 3]);
        $expected =
            '<input type="hidden" name="rooms" value=""/>
            <select name="rooms[]" multiple="multiple">
                <option value="0">1</option>
                <option value="1" selected="selected">2</option>
                <option value="2">3</option>
                <option value="3" selected="selected">4</option>
                <option value="4">5</option>
            </select>';
        $this->assertTextEquals($expected, $SelectTag->__toString());
    }

    public function testVal()
    {
        $SelectTag = new SelectTag($this->FormHelper, 'rooms');
        $SelectTag->options([1, 2, 3, 4, 5])
            ->val(3);
        $expected =
            '<select name="rooms">
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3" selected="selected">4</option>
                <option value="4">5</option>
            </select>';
        $this->assertTextEquals($expected, $SelectTag->__toString());
    }
}
