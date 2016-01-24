<?php

namespace Llvdl\Util;

class Utf8Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideCodePointAndUtf8
     */
    public function testUtf8Chr($codePoint, $utf8)
    {
        $this->assertEquals($utf8, Utf8::chr($codePoint));
    }

    public function provideCodePointAndUtf8()
    {
        return [
            '1 to 7 bits' => ['0x20', chr(0x20)],
            '8 to 11 bits' => [0x178, chr(0xC5).chr(0xB8)],
            '12 to 16 bits' => [0x2190, chr(0xE2).chr(0x86).chr(0x90)],
            '17 to 21 bits' => [0x1F063, chr(0xF0).chr(0x9F).chr(0x81).chr(0xA3)],
        ];
    }
}
