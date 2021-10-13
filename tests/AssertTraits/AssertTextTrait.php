<?php

namespace Bancer\FormBuilder\AssertTraits;

use PHPUnit\Framework\TestCase;

trait AssertTextTrait
{
    /**
     * Asserts that two strings are equals ignoring formatting (line breaks and spaces).
     *
     * @param string $expected Expected string.
     * @param string $actual Actual string.
     * @return void
     */
    public function assertTextEquals($expected, $actual)
    {
        /*
         * \h* - zero or more horizontal whitespaces (tabs, spaces...)
         * \R - any line break char (sequence)
         * \s* - and any zero or more whitespace chars.
         */
        $regex = '~\h*\R\s*~';
        $expectedOneLine = preg_replace($regex, '', $expected);
        $actualOneLine = preg_replace($regex, '', $actual);
        TestCase::assertEquals($expectedOneLine, $actualOneLine);
    }
}
