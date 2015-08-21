<?php

namespace cweagans\mcrypt\Tests;

class McryptCreateIvTest extends McryptTestBase
{
    public function testEncryptDecrypt()
    {
        $iv1 = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);
        $iv2 = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_DEV_URANDOM);
        $iv3 = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_DEV_RANDOM);
        $this->assertEquals(16, strlen($iv1));
        $this->assertEquals(16, strlen($iv2));
        $this->assertEquals(16, strlen($iv3));
    }
}
