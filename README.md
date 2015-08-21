# cweagans/mcrypt-polyfill

[![Build Status](https://travis-ci.org/cweagans/mcrypt-polyfill.svg?branch=master)](https://travis-ci.org/cweagans/mcrypt-polyfill)

The purpose of this project is to make it possible to uninstall the mcrypt
extension without breaking things.

# Process

* Ports tests from https://github.com/php/php-src/tree/master/ext/mcrypt/tests
  to PHPUnit tests in this project, making sure they pass with ext_mcrypt.
* Disable ext_mcrypt and start working on implementing the functions in src/mcrypt.php
    * Do NOT write your own crypto. Ever.
    * https://github.com/phpseclib/phpseclib supports everything needed (recommend
      ext_openssl for speed in some cases)

# Why?

* mcrypt hasn't been maintained since 2003
* We shouldn't depend on unmaintained crypto code
* Having a userspace polyfill makes it easier for the PHP core team to drop ext_mcrypt
