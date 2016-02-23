<?php

/**
 * @file
 * Contains cweagans\mcrypt\Tests\McryptResourceTest.
 */

namespace cweagans\mcrypt\Tests;

use cweagans\mcrypt\McryptResource;

class McryptResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Tests the getters and setters of McryptResource.
     */
    public function testGettersAndSetters()
    {
        $mcrypt_resource = new McryptResource();

        $mcrypt_resource->setKey("TESTKEY");
        $this->assertEquals($mcrypt_resource->getKey(), "TESTKEY");

        $mcrypt_resource->setIv("TESTIV");
        $this->assertEquals($mcrypt_resource->getIv(), "TESTIV");

        $mcrypt_resource->setMode("TESTMODE");
        $this->assertEquals($mcrypt_resource->getMode(), "TESTMODE");

        $mcrypt_resource->setCipher("TESTCIPHER");
        $this->assertEquals($mcrypt_resource->getCipher(), "TESTCIPHER");
    }
}
