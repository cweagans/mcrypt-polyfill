<?php

namespace cweagans\mcrypt\Tests;

class BugTest extends McryptTestBase
{
    /**
     * Bug #35496 (Crash in mcrypt_generic()/mdecrypt_generic() without proper init).
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug35496_mcrypt_generic()
    {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '', MCRYPT_MODE_OFB, '');
        mcrypt_generic($td, "foobar");
    }

    /**
     * Bug #35496 (Crash in mcrypt_generic()/mdecrypt_generic() without proper init).
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug35496_mdecrypt_generic()
    {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '', MCRYPT_MODE_OFB, '');
        mdecrypt_generic($td, "baz");
    }

    /**
     * Bug #37595 (mcrypt_generic calculates data length in wrong way)
     */
    public function testBug37595() {
        $skey = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
        $key = '';
        foreach ($skey as $t) {
            $key .= chr($t);
        }

        $sstr = array(1, 2, 3, 4, 5, 6, 7, 8);
        $iv = '';
        foreach ($sstr as $s) {
            $iv .= chr($s);
        }

        $td = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CBC, '');

        $data = array(
          '12345678' => "12345678",
          '123456789' => "123456789\0\0\0\0\0\0\0",
          "\x001234567" => "\x001234567",
          '1234567812345678' => "1234567812345678",
          '12345678123456789' => "12345678123456789\0\0\0\0\0\0\0",
        );

        foreach ($data as $input => $expected) {
            mcrypt_generic_init($td, $key, $iv);
            $enc = mcrypt_generic($td, $input);

            mcrypt_generic_deinit($td);

            mcrypt_generic_init($td, $key, $iv);
            $dec = @mdecrypt_generic($td, $enc);
            $this->assertEquals($expected, $dec);
        }
        mcrypt_module_close($td);
    }

    /**
     * Bug #37595 (mcrypt_generic calculates data length in wrong way)
     * Empty string part of the test.
     *
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug37595_empty() {
        $skey = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
        $key = '';
        foreach ($skey as $t) {
            $key .= chr($t);
        }

        $sstr = array(1, 2, 3, 4, 5, 6, 7, 8);
        $iv = '';
        foreach ($sstr as $s) {
            $iv .= chr($s);
        }

        $td = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CBC, '');
        $input = '';
        mcrypt_generic_init($td, $key, $iv);
        $enc = mcrypt_generic($td, $input);

        mcrypt_generic_deinit($td);

        mcrypt_generic_init($td, $key, $iv);
        $dec = @mdecrypt_generic($td, $enc);

        $this->assertEquals(false, $dec);

        mcrypt_module_close($td);
    }

    /**
     * Bug #41252 (Calling mcrypt_generic without first calling mcrypt_generic_init crashes)
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug41252() {
        $td = mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_ECB, '');
        echo mcrypt_generic($td,'aaaaaaaa');
    }

    /**
     * Bug #43143 (Warning about empty IV with MCRYPT_MODE_ECB)
     */
    public function testBug43143_nowarning() {
        $input = 'to be encrypted';
        $mkey = hash('sha256', 'secret key', TRUE);
        $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mkey, $input, MCRYPT_MODE_ECB);
        $this->assertEquals(base64_decode("SDR1QerNB9NNl8x8kCHKYxjqZuPGDY003hwz9gIyozo="), $data);
    }

    /**
     * Bug #43143 (Warning about empty IV with MCRYPT_MODE_ECB)
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug43143_warning() {
        $input = 'to be encrypted';
        $mkey = hash('sha256', 'secret key', TRUE);
        $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mkey, $input, MCRYPT_MODE_CFB);
    }

    /**
     * Bug #46010 (warnings incorrectly generated for iv in ecb mode)
     */
    public function testBug46010() {
        $key = "012345678901234567890123";
        $expected = "f7a2ce11d4002294";
        $this->assertEquals($expected, bin2hex(mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, "data", MCRYPT_MODE_ECB)));
        $this->assertEquals($expected, bin2hex(mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, "data", MCRYPT_MODE_ECB, "a")));
        $this->assertEquals($expected, bin2hex(mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, "data", MCRYPT_MODE_ECB, "12345678")));
    }

    /**
     * Bug #49738 (calling mcrypt after mcrypt_generic_deinit crashes)
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testBug49738() {
        $td = mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_ECB, '');
        mcrypt_generic_init($td, 'aaaaaaaa', 'aaaaaaaa');
        mcrypt_generic_deinit($td);
        mcrypt_generic($td, 'aaaaaaaa');
    }

    /**
     * Bug #55169 (mcrypt_create_iv)
     */
    public function testBug55169() {
        for( $i=1; $i<=64; $i = $i*2 ){
            $random = mcrypt_create_iv( $i, MCRYPT_DEV_URANDOM );
            $this->assertEquals($i, strlen($random));
        }
    }

    /**
     * Bug #8040 (MCRYPT_MODE_* do not seem to exist)
     *
     * This test is a little more bare than the upstream test, since
     * cweagans/mcrypt-polyfill is defining these constants.
     */
    public function testBug8040() {
        $this->assertTrue(defined('MCRYPT_TWOFISH'));
        $this->assertEquals(MCRYPT_TWOFISH, "twofish");
        $this->assertTrue(defined('MCRYPT_MODE_CBC'));
        $this->assertEquals(MCRYPT_MODE_CBC, "cbc");
    }

}
