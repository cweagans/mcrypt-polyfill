# cweagans/mcrypt-polyfill

[![Build Status](https://travis-ci.org/cweagans/mcrypt-polyfill.svg?branch=master)](https://travis-ci.org/cweagans/mcrypt-polyfill) [![Coverage Status](https://coveralls.io/repos/github/cweagans/mcrypt-polyfill/badge.svg?branch=master)](https://coveralls.io/github/cweagans/mcrypt-polyfill?branch=master)

The purpose of this project is to make it possible to uninstall the mcrypt
extension without breaking things.

# Process

* Disable ext_mcrypt and start working on implementing the functions in src/mcrypt.php
* Do NOT write your own crypto. Ever.
    * https://github.com/phpseclib/phpseclib supports everything needed (recommend
      ext_openssl for speed in some cases)
* Don't edit the existing tests, but feel free to add new ones.
* A PR that increases the number of failing tests will not be merged until the
  number of passing tests increases or stays the same.

# Test metrics

Coming soon.

# Why?

* mcrypt hasn't been maintained since 2003
* We shouldn't depend on unmaintained crypto code
* Having a userspace polyfill makes it easier for the PHP core team to drop ext_mcrypt
