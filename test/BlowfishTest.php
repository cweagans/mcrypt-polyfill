<?php

namespace cweagans\mcrypt\Tests;

class BlowfishTest extends McryptTestBase
{
    /**
     * @param $plain
     *   Cleartext hexadecimal string to encrypt.
     * @param $key
     *   Key to encrypt $plain with.
     * @param $crypt
     *   Expected encrypted string.
     * @dataProvider vectorProvider
     */
    public function testBlowfishCompatibility($plain, $key, $crypt)
    {
        $null = "\0\0\0\0\0\0\0\0";
        $td = mcrypt_module_open(MCRYPT_BLOWFISH, "", MCRYPT_MODE_ECB, "");

        $key = hex2bin(trim($key));
        $plain = hex2bin($plain);
        $crypt = strtolower(trim($crypt));

        mcrypt_generic_init($td, $key, $null);
        $guess = mcrypt_generic($td, $plain);
        $guess = bin2hex($guess);

        $this->assertEquals($crypt, $guess, "");
    }
}
