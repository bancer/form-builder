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

    public function testNewButton()
    {
        $ButtonTag = $this->FormBuilder->newButton('OK')
            ->confirm('Are you sure?');
        $expected =
            '<button type="submit" onclick="if (confirm(&quot;Are you sure?&quot;)) { return true; } return false;">
                OK
            </button>';
        $this->assertTextEquals($expected, $ButtonTag->__toString());
    }

    public function testNewPostButton()
    {
        $PostButtonTag = $this->FormBuilder->newPostButton('OK', '/login')
            ->data(['id' => 1]);
        $expected =
            '<form method="post" action="/login">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>
                <input type="hidden" name="id" value="1"/>
                <button type="submit">OK</button>
            </form>';
        $this->assertTextEquals($expected, $PostButtonTag->__toString());
    }

    public function testNewPostLink()
    {
        $PostLinkTag = $this->FormBuilder->newPostLink('Log In')
            ->url('/login');
        $actual = $PostLinkTag->__toString();
        $this->assertStringContainsString('method="post" action="/login"', $actual);
        $this->assertStringContainsString('<input type="hidden" name="_method" value="POST"/>', $actual);
        $this->assertStringContainsString('<a href="#" onclick="document.post', $actual);
        $this->assertStringContainsString('Log In</a>', $actual);
    }

    public function testNewLabel()
    {
        $LabelTag = $this->FormBuilder->newLabel('User.password')
            ->text('Password')
            ->for('#UserPassword');
        $expected = '<label for="#UserPassword">Password</label>';
        $this->assertEquals($expected, $LabelTag->__toString());
    }

    public function testNewMeridian()
    {
        $MeridianTag = $this->FormBuilder->newMeridian('Model.field');
        $expected =
            '<select name="Model[field][meridian]">
                <option value="" selected="selected"></option>
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>';
        $this->assertTextEquals($expected, $MeridianTag->__toString());
    }

    public function testNewMinute()
    {
        $MinuteTag = $this->FormBuilder->newMinute('Model.field');
        $expected =
            '<select name="Model[field][minute]">
                <option value="" selected="selected"></option>
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>';
        $this->assertTextEquals($expected, $MinuteTag->__toString());
    }

    public function testNewHour()
    {
        $HourTag = $this->FormBuilder->newHour('Model.field');
        $expected =
            '<select name="Model[field][hour]">
                <option value="" selected="selected"></option>
                <option value="00">0</option>
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
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
            </select>';
        $this->assertTextEquals($expected, $HourTag->__toString());
    }

    public function testNewDay()
    {
        $DayTag = $this->FormBuilder->newDay('Model.fields');
        $expected =
            '<select name="Model[fields][day]">
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
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>';
        $this->assertTextEquals($expected, $DayTag->__toString());
    }

    public function testNewMonth()
    {
        $MonthTag = $this->FormBuilder->newMonth('Model.field')
            ->monthNames([
                1 => 'Jan',
                2 => 'Feb',
                3 => 'Mar',
                4 => 'Apr',
                5 => 'May',
                6 => 'Jun',
                7 => 'Jul',
                8 => 'Aug',
                9 => 'Sep',
                10 => 'Oct',
                11 => 'Nov',
                12 => 'Dec',
            ]);
        $expected =
            '<select name="Model[field][month]">
                <option value="" selected="selected"></option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>';
        $this->assertTextEquals($expected, $MonthTag->__toString());
    }

    public function testNewYear()
    {
        $YearTag = $this->FormBuilder->newYear('Model.field');
        $expected =
            '<select name="Model[field][year]">
                <option value="" selected="selected"></option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
            </select>';
        $this->assertTextEquals($expected, $YearTag->__toString());
    }
}
