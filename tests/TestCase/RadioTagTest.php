<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\RadioTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class RadioTagTest extends TestCase
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

    public function testOptions()
    {
        $RadioTag = new RadioTag($this->FormHelper, 'gender');
        $RadioTag->options(['Male', 'Female']);
        $expected =
            '<input type="hidden" name="gender" value=""/>
            <label for="gender-0">
                <input type="radio" name="gender" value="0" id="gender-0">
                Male
            </label>
            <label for="gender-1">
                <input type="radio" name="gender" value="1" id="gender-1">
                Female
            </label>';
        $this->assertTextEquals($expected, $RadioTag->__toString());
    }

    public function testEmpty()
    {
        $RadioTag = new RadioTag($this->FormHelper, 'gender');
        $RadioTag->options(['Male', 'Female'])
            ->empty(true);
        $expected =
            '<input type="hidden" name="gender" value=""/>
            <label for="gender">
                <input type="radio" name="gender" value="" id="gender">
                empty
            </label>
            <label for="gender-0">
                <input type="radio" name="gender" value="0" id="gender-0">
                Male
            </label>
            <label for="gender-1">
                <input type="radio" name="gender" value="1" id="gender-1">
                Female
            </label>';
        $this->assertTextEquals($expected, $RadioTag->__toString());
    }

    public function testLabel()
    {
        $RadioTag = new RadioTag($this->FormHelper, 'gender');
        $RadioTag->options(['Male', 'Female'])
            ->label(false);
        $expected =
            '<input type="hidden" name="gender" value=""/>
            <input type="radio" name="gender" value="0" id="gender-0">
            <input type="radio" name="gender" value="1" id="gender-1">';
        $this->assertTextEquals($expected, $RadioTag->__toString());
    }
}
