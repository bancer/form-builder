<?php

namespace Bancer\FormBuilder\TestCase;

use ArgumentCountError;
use Bancer\FormBuilder\AssertTraits\AssertTextTrait;
use Bancer\FormBuilder\FormBuilder;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use PHPUnit\Framework\TestCase;

class FormBuilderTest extends TestCase
{
    use AssertTextTrait;

    private $FormBuilder;

    public function setUp(): void
    {
        $View = new View();
        $FormHelper = new FormHelper($View);
        $this->FormBuilder = new FormBuilder($FormHelper);
    }

    public function testConstructEmpty()
    {
        $this->expectException(ArgumentCountError::class);
        new FormBuilder();
    }

    public function testConstruct()
    {
        $View = new View();
        $FormHelper = new FormHelper($View);
        $FormBuilder = new FormBuilder($FormHelper);
        $this->assertInstanceOf(FormBuilder::class, $FormBuilder);
    }

    public function testNewForm()
    {
        $FormTag = $this->FormBuilder->newForm();
        $expected =
            '<form method="post" action="/">
                <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>';
        $this->assertTextEquals($expected, $FormTag->__toString());
    }

    public function testNewFormComplete()
    {
        $FormTag = $this->FormBuilder->newForm()
            ->method('get')
            ->url('/login')
            ->encoding('UTF-8')
            ->id('login-form')
            ->classes('narrow-form')
            ->attribute('translate', 'no');
        $expected =
            '<form method="get" accept-charset="UTF-8" id="login-form" class="narrow-form" translate="no" action=
                    "/login">
                <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>';
        $this->assertTextEquals($expected, $FormTag->__toString());
    }

    public function testNewControl()
    {
        $ControlTag = $this->FormBuilder->newControl('countries')
            ->empty('Select a country')
            ->options([
                'ger' => 'Germany',
                'fra' => 'France',
                'rus' => 'Russia',
            ])
            ->default('rus')
            ->label('User Country');
        $expected =
            '<div class="input select">
                <label for="countries">User Country</label>
                <select name="countries" id="countries">
                    <option value="">Select a country</option>
                    <option value="ger">Germany</option>
                    <option value="fra">France</option>
                    <option value="rus" selected="selected">Russia</option>
                </select>
            </div>';
        $this->assertTextEquals($expected, $ControlTag->__toString());
    }

    public function testNewText()
    {
        $TextTag = $this->FormBuilder->newText('User.email')
            ->placeholder('Enter your email')
            ->form('login-form')
            ->maxLength(50);
        $expected = '<input type="text" name="User[email]" placeholder="Enter your email" form=
            "login-form" maxlength="50"/>';
        $this->assertTextEquals($expected, $TextTag->__toString());
    }

    public function testNewPassword()
    {
        $PasswordTag = $this->FormBuilder->newPassword('User.password');
        $expected = '<input type="password" name="User[password]"/>';
        $this->assertEquals($expected, $PasswordTag->__toString());
    }

    public function testNewHidden()
    {
        $HiddenTag = $this->FormBuilder->newHidden('User.id');
        $expected = '<input type="hidden" name="User[id]"/>';
        $this->assertEquals($expected, $HiddenTag->__toString());
    }

    public function testNewTextArea()
    {
        $TextAreaTag = $this->FormBuilder->newTextArea('notes');
        $expected = '<textarea name="notes" rows="5"></textarea>';
        $this->assertEquals($expected, $TextAreaTag->__toString());
    }

    public function testNewCheckBox()
    {
        $CheckBoxTag = $this->FormBuilder->newCheckBox('done');
        $expected = '<input type="hidden" name="done" value="0"/><input type="checkbox" name="done" value="1">';
        $this->assertEquals($expected, $CheckBoxTag->__toString());
    }

    public function testNewRadio()
    {
        $RadioTag = $this->FormBuilder->newRadio('gender');
        $expected = '<input type="hidden" name="gender" value=""/>';
        $this->assertEquals($expected, $RadioTag->__toString());
    }

    public function testNewSelect()
    {
        $SelectTag = $this->FormBuilder->newSelect('gender')
            ->options(['male', 'female']);
        $expected =
            '<select name="gender">
                <option value="0">male</option>
                <option value="1">female</option>
            </select>';
        $this->assertTextEquals($expected, $SelectTag->__toString());
    }

    public function testNewFile()
    {
        $FileTag = $this->FormBuilder->newFile('avatar');
        $expected = '<input type="text" name="avatar"/>';
        $this->assertEquals($expected, $FileTag->__toString());
    }

    public function testNewDateTime()
    {
        $DateTimeTag = $this->FormBuilder->newDateTime('two_months')
            ->empty('Select month')
            ->monthNames([1 => 'Jan', 2 => 'Feb'])
            ->year(false)
            ->day(false)
            ->hour(false)
            ->minute(false)
            ->second(false)
            ->meridian(false);
        $expected =
            '<select name="two_months[month]">
                <option value="" selected="selected">Select month</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
            </select>';
        $this->assertTextEquals($expected, $DateTimeTag->__toString());
    }

    public function testNewDate()
    {
        $DateTag = $this->FormBuilder->newDate('year_month')
            ->maxYear(2021)
            ->minYear(2018)
            ->orderYear('asc')
            ->monthNames([1 => 'Jan', 2 => 'Feb'])
            ->day(false);
        $expected =
            '<select name="year_month[year]">
                <option value="" selected="selected"></option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
            <select name="year_month[month]">
                <option value="" selected="selected"></option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
            </select>';
        $this->assertTextEquals($expected, $DateTag->__toString());
    }

    public function testNewTime()
    {
        $TimeTag = $this->FormBuilder->newTime('start_time')
            ->interval(7)
            ->round('up')
            ->timeFormat(12);
        $expected =
            '<select name="start_time[hour]">
                <option value="" selected="selected"></option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="start_time[minute]">
                <option value="" selected="selected"></option>
                <option value="00">00</option>
                <option value="07">07</option>
                <option value="14">14</option>
                <option value="21">21</option>
                <option value="28">28</option>
                <option value="35">35</option>
                <option value="42">42</option>
                <option value="49">49</option>
                <option value="56">56</option>
            </select>
            <select name="start_time[meridian]">
                <option value="" selected="selected"></option>
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>';
        $this->assertTextEquals($expected, $TimeTag->__toString());
    }

    public function testNewSubmit()
    {
        $SubmitTag = $this->FormBuilder->newSubmit('OK');
        $expected = '<div class="submit"><input type="submit" value="OK"/></div>';
        $this->assertEquals($expected, $SubmitTag->__toString());
    }

    public function testEnd()
    {
        $this->assertEquals('</form>', $this->FormBuilder->end());
    }
}
