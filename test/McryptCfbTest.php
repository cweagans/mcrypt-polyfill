<?php

namespace cweagans\mcrypt\Tests;

class McryptCfbTest extends McryptTestBase
{
    public function testEncryptDecrypt()
    {
        $key      = "0123456789012345";
        $secret   = "PHP Testfest 2008";
        $cipher   = MCRYPT_RIJNDAEL_128;
        $iv       = mcrypt_create_iv(mcrypt_get_iv_size($cipher, MCRYPT_MODE_CFB), MCRYPT_RAND);
        $enc_data = mcrypt_encrypt($cipher, $key, $secret, MCRYPT_MODE_CFB, $iv);
        $dec_data = mcrypt_decrypt($cipher, $key, $enc_data, MCRYPT_MODE_CFB, $iv);
        $this->assertEquals($secret, $dec_data);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testRequireIV()
    {
        $key      = "0123456789012345";
        $secret   = "PHP Testfest 2008";
        $cipher   = MCRYPT_RIJNDAEL_128;
        $iv       = mcrypt_create_iv(mcrypt_get_iv_size($cipher, MCRYPT_MODE_CFB), MCRYPT_RAND);
        $enc_data = mcrypt_encrypt($cipher, $key, $secret, MCRYPT_MODE_CFB, $iv);
        $dec_data = mcrypt_decrypt($cipher, $key, $enc_data, MCRYPT_MODE_CFB);
    }
}
