<?php

/**
 * @file
 * Contains cweagans\mcrypt-polyfill\Tests\NotImplementedExceptionTest.
 */

namespace cweagans\mcrypt\Tests;

use cweagans\mcrypt\Exception\NotImplementedException;

class NotImplementedExceptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \cweagans\mcrypt\Exception\NotImplementedException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage testNotImplementedException() is not yet implemented.
     */
    public function testNotImplementedException()
    {
        throw new NotImplementedException();
    }
}
