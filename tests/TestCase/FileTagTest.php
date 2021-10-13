<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\FileTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class FileTagTest extends TestCase
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

    public function testAccept()
    {
        $FileTag = new FileTag($this->FormHelper, 'avatar');
        $FileTag->accept('image/*');
        $expected = '<input type="text" name="avatar" accept="image/*"/>';
        $this->assertEquals($expected, $FileTag->__toString());
    }
}
