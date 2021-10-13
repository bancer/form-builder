<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\DateTimeTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class DateTimeTagTest extends TestCase
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

    public function testDisableAll()
    {
        $DateTimeTag = new DateTimeTag($this->FormHelper, 'when');
        $DateTimeTag->year(false)
            ->month(false)
            ->day(false)
            ->hour(false)
            ->minute(false)
            ->second(false)
            ->meridian(false);
        $expected = '';
        $this->assertTextEquals($expected, $DateTimeTag->__toString());
    }
}
