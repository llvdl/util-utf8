<?php

namespace Llvdl\Util;

class Utf8
{
    /**
     * as the standard php chr function, but this function
     * outputs an UTF8 encoded string.
     * 
     * @param int $unicodePoint
     *
     * @return UTF-8 encoded string for codepoint or empty string if 
     *               codepoint is invalid 
     */
    public static function chr($unicodePoint)
    {
        if ($unicodePoint < 0) {
            return '';
        } elseif ($unicodePoint < (1 << 7)) {
            return chr($unicodePoint);
        } elseif ($unicodePoint < (1 << 11)) {
            return chr(0xC0 | ($unicodePoint >> 6))
                .chr(0x80 | (($unicodePoint >> 0) & 0x3F));
        } elseif ($unicodePoint < (1 << 16)) {
            return chr(0xE0 | ($unicodePoint >> 12))
                .chr(0x80 | (($unicodePoint >> 6) & 0x3F))
                .chr(0x80 | (($unicodePoint >> 0) & 0x3F));
        } elseif ($unicodePoint < (1 << 21)) {
            return chr(0xF0 | ($unicodePoint >> 18))
                .chr(0x80 | (($unicodePoint >> 12) & 0x3F))
                .chr(0x80 | (($unicodePoint >> 6) & 0x3F))
                .chr(0x80 | (($unicodePoint >> 0) & 0x3F));
        } else {
            return '';
        }
    }
}
