<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\ControlTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class ControlTagTest extends TestCase
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

    public function testFewMethods()
    {
        $ControlTag = new ControlTag($this->FormHelper, 'user_name');
        $ControlTag->default('John Wick')
            ->empty('select one')
            ->error('show me when error')
            ->label('User Name');
        $expected =
            '<div class="input text">
                <label for="user-name">User Name</label>
                <input type="text" name="user_name" empty="select one" id="user-name" value="John Wick"/>
            </div>';
        $this->assertTextEquals($expected, $ControlTag->__toString());
    }

    public function testCheckbox()
    {
        $ControlTag = new ControlTag($this->FormHelper, 'agree');
        $ControlTag->type('checkbox')
            ->label('I Agree')
            ->labelOptions(false)
            ->required(false)
            ->templates([
                'inputContainer' => '<div class="form-control">{{content}}</div>',
            ]);
        $expected =
            '<div class="form-control">
                <input type="hidden" name="agree" value="0"/>
                <label for="agree">
                    <input type="checkbox" name="agree" value="1" id="agree">
                    I Agree
                </label>
            </div>';
        $this->assertTextEquals($expected, $ControlTag->__toString());
    }

    public function testNestredInput()
    {
        $ControlTag = new ControlTag($this->FormHelper, 'agree');
        $ControlTag->type('checkbox')
            ->label('I Agree')
            ->nestedInput(false);
        $expected =
            '<div class="input checkbox"><label for="agree">I Agree</label></div>';
        $this->assertTextEquals($expected, $ControlTag->__toString());
    }
}
