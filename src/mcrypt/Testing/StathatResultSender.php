<?php

namespace cweagans\mcrypt\Testing;

use PHPUnit_Framework_AssertionFailedError;
use PHPUnit_Framework_Test;
use PHPUnit_Framework_BaseTestListener;
use PHPUnit_Framework_TestSuite;
use PradoDigital\StatHat\AsyncHttpClient;
use PradoDigital\StatHat\StatHatEz;

class StathatResultSender extends PHPUnit_Framework_BaseTestListener
{
    protected $failures = 0;

    /**
     * @inheritDoc
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        // If there's no API key set, don't track results.
        // Also don't track PRs.
        if (!getenv('STATHAT_API_KEY') || getenv('TRAVIS_PULL_REQUEST') != 'false') {
            return;
        }

        $php_version = getenv('PHP_VERSION');
        $mcrypt = 'no-mcrypt';
        if (getenv('ENABLE_MCRYPT') === '1') {
            $mcrypt = 'mcrypt';
        }

        $stat_name = 'mcrypt-polyfill-php-' . $php_version . '-' . $mcrypt . '-failures';
        $value = $this->failures;

        $client = new AsyncHttpClient();
        $api_key = getenv('STATHAT_API_KEY');
        $stathat = new StatHatEz($client, $api_key);
        $stathat->ezValue($stat_name, $value);
    }

    /**
     * @inheritDoc
     */
    public function addFailure(
        PHPUnit_Framework_Test $test,
        PHPUnit_Framework_AssertionFailedError $e,
        $time
    ) {
        // We know that every phpt test is one assertion.
        $this->failures++;
    }
}
