<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\TextTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class TextTagTest extends TestCase
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

    public function testReadOnly()
    {
        $TextTag = new TextTag($this->FormHelper, 'email');
        $TextTag->readOnly();
        $expected = '<input type="text" name="email" readonly="readonly"/>';
        $this->assertTextEquals($expected, $TextTag->__toString());
    }

    public function testDisabled()
    {
        $TextTag = new TextTag($this->FormHelper, 'email');
        $TextTag->disabled(true);
        $expected = '<input type="text" name="email" disabled="disabled"/>';
        $this->assertTextEquals($expected, $TextTag->__toString());
    }

    public function testBuildComplexInput()
    {
        $TextTag = new TextTag($this->FormHelper, 'password');
        $TextTag->autocomplete('off')
            ->autofocus()
            ->default('12345678')
            ->form('login-form')
            ->maxLength(20)
            ->minLength(8)
            ->name('data[User][password]')
            ->pattern('[A-Za-z]')
            ->placeholder('Enter your password')
            ->required()
            ->size(22)
            ->value('abcdefgh');
        $expected = '<input type="text" name="data[User][password]" autocomplete="off" autofocus=
            "autofocus" form="login-form" maxlength="20" minlength="8" pattern=
            "[A-Za-z]" placeholder="Enter your password" required=
            "required" size="22" value="abcdefgh"/>';
        $this->assertTextEquals($expected, $TextTag->__toString());
    }

    public function testGlobalAttributes()
    {
        $TextTag = new TextTag($this->FormHelper, 'email');
        $TextTag->accessKey('e')
            ->attribute('data-auth', 'false')
            ->classes('w12 h50')
            ->contentEditable('true')
            ->dir('auto')
            ->draggable('false')
            ->hidden()
            ->id('user-email')
            ->lang('en')
            ->spellcheck('false')
            ->style('marging: 5px;')
            ->tabIndex(2)
            ->title('User Email');
        $expected = '<input type="text" name="email" accesskey="e" class="w12 h50" contenteditable="true" dir=
            "auto" draggable="false" hidden="hidden" id="user-email" lang="en" spellcheck="false" style=
            "marging: 5px;" tabindex="2" title="User Email" data-auth="false"/>';
        $this->assertTextEquals($expected, $TextTag->__toString());
    }
}
