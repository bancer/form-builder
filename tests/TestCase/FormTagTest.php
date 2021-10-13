<?php

namespace Bancer\FormBuilder\TestCase;

use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\FormTag;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class FormTagTest extends TestCase
{
    use AssertTextTrait;

    /**
     * @var \Bancer\FormBuilder\FormTag
     */
    private $FormTag;

    public function setUp(): void
    {
        $View = new View();
        $FormHelper = new FormHelper($View);
        $this->FormTag = new FormTag($FormHelper);
    }

    public function testConstructor()
    {
        $expected =
            '<form method="post" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testType()
    {
        $this->FormTag->type('get');
        $expected = '<form method="get" action="/">';
        $this->assertEquals($expected, $this->FormTag->__toString());
    }

    public function testMethod()
    {
        $this->FormTag->method('delete');
        $expected =
            '<form method="delete" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testUrl()
    {
        $this->FormTag->url('/login');
        $expected =
            '<form method="post" action="/login">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testFewMethods()
    {
        $this->FormTag->attribute('lang', 'eng')
            ->autocomplete('off')
            ->classes('narrow small')
            ->encoding('UTF-8')
            ->id('abc')
            ->idPrefix('def')
            ->method('put')
            ->name('my-form')
            ->novalidate()
            ->rel('search')
            ->style('width: 100px')
            ->target('_self')
            ->title('Log in')
            ->url('/login');
        $expected =
            '<form method="put" accept-charset="UTF-8" autocomplete="off" class="narrow small" id="abc" name=
                    "my-form" novalidate="novalidate" rel="search" style="width: 100px" target="_self" title=
                    "Log in" lang="eng" action="/login">
                <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testContext()
    {
        $this->FormTag->context([]);
        $expected =
            '<form method="post" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testEnctype()
    {
        $this->FormTag->enctype('multipart/form-data');
        $expected =
            '<form method="post" enctype="multipart/form-data" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testTemplateVars()
    {
        $this->FormTag
            ->templates([
                'formStart' => '<h4 class="mb">{{header}}</h4><form{{attrs}}>',
            ])
            ->templateVars(['header' => 'headertext']);
        $expected =
            '<h4 class="mb">headertext</h4>
            <form method="post" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }

    public function testValueSources()
    {
        $this->FormTag->valueSources(['query', 'data']);
        $expected =
            '<form method="post" action="/">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>';
        $this->assertTextEquals($expected, $this->FormTag->__toString());
    }
}
