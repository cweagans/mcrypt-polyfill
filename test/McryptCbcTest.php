<?php

namespace cweagans\mcrypt\Tests;

class McryptCbcTest extends McryptTestBase
{
    public function testEncryptDecrypt() {
        $key      = "0123456789012345";
        $secret   = "PHP Testfest 2008";
        $cipher   = MCRYPT_RIJNDAEL_128;
        $iv       = mcrypt_create_iv(mcrypt_get_iv_size($cipher, MCRYPT_MODE_CBC), MCRYPT_RAND);
        $enc_data = mcrypt_encrypt($cipher, $key, $secret, MCRYPT_MODE_CBC, $iv);
        $dec_data = mcrypt_decrypt($cipher, $key, $enc_data, MCRYPT_MODE_CBC, $iv);
        $this->assertEquals($secret, trim($dec_data));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testEncryptDecrypt_no_iv() {
        $key      = "0123456789012345";
        $secret   = "PHP Testfest 2008";
        $cipher   = MCRYPT_RIJNDAEL_128;
        $iv       = mcrypt_create_iv(mcrypt_get_iv_size($cipher, MCRYPT_MODE_CBC), MCRYPT_RAND);
        $enc_data = mcrypt_encrypt($cipher, $key, $secret, MCRYPT_MODE_CBC, $iv);
        $dec_data = mcrypt_decrypt($cipher, $key, $enc_data, MCRYPT_MODE_CBC);

        // mcrypt_decrypt should return false in this scenario in addition to the warning.
        $this->assertFalse($dec_data);
    }

    public function test3desKeyLengths_decrypt() {
        $cipher = MCRYPT_TRIPLEDES;
        $iv = b'12345678';

        $key = b'12345678';
        $data = 'IleMhoxiOthmHua4tFBHOw==';
        $this->assertEquals(8, strlen($key));
        try {
            mcrypt_decrypt($cipher, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        $key = b'12345678901234567890';
        $data = 'EeF1s6C+w1IiHj1gdDn81g==';
        $this->assertEquals(20, strlen($key));
        try {
            mcrypt_decrypt($cipher, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        $key = b'123456789012345678901234';
        $data = 'EEuXpjZPueyYoG0LGQ199Q==';
        $this->assertEquals(24, strlen($key));
        $decoded = mcrypt_decrypt($cipher, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
        $this->assertEquals('736563726574206d6573736167650000', bin2hex($decoded));

        $key = b'12345678901234567890123456';
        $data = 'EeF1s6C+w1IiHj1gdDn81g==';
        $this->assertEquals(26, strlen($key));
        try {
            mcrypt_decrypt($cipher, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }
    }

    public function test3desIvLengths_decrypt() {
        $cipher = MCRYPT_TRIPLEDES;
        $key = b'123456789012345678901234';

        // Short IV
        $iv = b'1234';
        $this->assertEquals(4, strlen($iv));
        try {
            mcrypt_decrypt($cipher, $key, base64_decode('+G7nGcWIxij3TZjpI9lJdQ=='), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        // Correct IV
        $iv = b'12345678';
        $dec = mcrypt_decrypt($cipher, $key, base64_decode('3bJiFMeyScxOLQcE6mZtLg=='), MCRYPT_MODE_CBC, $iv);
        $this->assertEquals("659ec947f4dc3a3b9c50de744598d3c8", bin2hex($dec));

        // Long IV
        $iv = b'123456789';
        $this->assertEquals(9, strlen($iv));
        try {
            mcrypt_decrypt($cipher, $key, base64_decode('+G7nGcWIxij3TZjpI9lJdQ=='), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }
    }

    public function test3desKeyLengths_encrypt() {
        $cipher = MCRYPT_TRIPLEDES;
        $iv = b'12345678';
        $data = b"This is the secret message which must be encrypted";

        $key = b'12345678';
        $this->assertEquals(8, strlen($key));
        try {
            mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        $key = b'12345678901234567890';
        $this->assertEquals(20, strlen($key));
        try {
            mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        $key = b'123456789012345678901234';
        $this->assertEquals(24, strlen($key));
        $encrypted = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        $this->assertEquals('b85e21072239d60c63a80e7c9ae493cb741a1cd407e52f451c5f43a0d103f55a7b62617eb2e44213c2d44462d388bc0b8f119384b12c84ac', bin2hex($encrypted));

        $key = b'12345678901234567890123456';
        $this->assertEquals(26, strlen($key));
        try {
            mcrypt_encrypt($cipher, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }
    }

    public function test3desIvLengths_encrypt() {
        $cipher = MCRYPT_TRIPLEDES;
        $key = b'123456789012345678901234';
        $data = b"This is the secret message which must be encrypted";

        // Short IV
        $iv = b'1234';
        $this->assertEquals(4, strlen($iv));
        try {
            mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }

        // Correct IV
        $iv = b'12345678';
        $encrypted = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        $this->assertEquals("b85e21072239d60c63a80e7c9ae493cb741a1cd407e52f451c5f43a0d103f55a7b62617eb2e44213c2d44462d388bc0b8f119384b12c84ac", bin2hex($encrypted));

        // Long IV
        $iv = b'123456789';
        $this->assertEquals(9, strlen($iv));
        try {
            mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
        }
        catch (\PHPUnit_Framework_Error_Warning $e) {
            $this->assertEquals(E_WARNING, $e->getCode());
        }
    }
}
