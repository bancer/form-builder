<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\SubmitTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class SubmitTagTest extends TestCase
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

    public function testFormRelatedMethods()
    {
        $SubmitTag = new SubmitTag($this->FormHelper, 'Search');
        $SubmitTag->formMethod('get')
            ->formAction('/posts')
            ->formTarget('_self')
            ->formEncType('application/x-www-form-urlencoded')
            ->formNoValidate();
        $expected =
            '<div class="submit">
                <input type="submit" formmethod="get" formaction="/posts" formtarget="_self" formenctype=
                    "application/x-www-form-urlencoded" formnovalidate="formnovalidate" value="Search"/>
            </div>';
        $this->assertTextEquals($expected, $SubmitTag->__toString());
    }
}
