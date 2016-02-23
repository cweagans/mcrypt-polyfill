#!/usr/bin/env bash

# If we don't have TRAVIS_BUILD_DIR, this script is not being run on Travis CI,
# so we need to set the variable so that local runs will work properly.
[ -n "${TRAVIS_BUILD_DIR}" ] || export TRAVIS_BUILD_DIR=`pwd`

# Ensures that there is a working Docker environment. If not, exit the script
# and let the user know they have some work to do before they can use this script.
function requireDocker {
    docker ps > /dev/null 2>&1
    if [[ "$?" != "0" ]]; then
        cat <<EOT
To continue, you must have a working Docker installation. If you don't have this
set up, install Docker Toolbox and follow the tutorial for docker-machine. When
you can successfully run "docker ps", you can re-run this script.
EOT
        exit 1
    fi
}

# Runs a test suite for a single $PHP_VERSION and $ENABLE_MCRYPT value.
#
# Depends on:
#   Variable $PHP_VERSION set to one of 5.4, 5.5, 5.6, 7.0
#   Variable $ENABLE_MCRYPT set to one of 0, 1
#   Working Docker installation (enforced by requireDocker)
function runTest {
    # Ensure that we have the variables we need to be able to run the tests.
    MISSING_VARS=false
    if [ ! -n "${PHP_VERSION}" ]; then
        echo "You must define the PHP_VERSION env var to run a single test."
        export MISSING_VARS=true
    fi
    if [ ! -n "${ENABLE_MCRYPT}" ]; then
        echo "You must define the ENABLE_MCRYPT env var to run a single test."
        export MISSING_VARS=true
    fi

    # Bail out early if we're missing something we need.
    # @todo: Should these vars have a default value?
    if $MISSING_VARS; then
        exit 1
    fi

    # TESTPATH is the location where the Docker daemon can find a Dockerfile.
    TESTPATH="tests/docker/$PHP_VERSION"

    # IMAGE_NAME is the name that the newly-built Docker image will be given.
    IMAGE_NAME="mcrypt-polyfill/$PHP_VERSION"

    # If we're enabling mcrypt, we need to change both TESTPATH and IMAGE_NAME
    # a bit to take that into account.
    if [[ $ENABLE_MCRYPT == "1" ]]; then
        TESTPATH="tests/docker/$PHP_VERSION-mcrypt"
        IMAGE_NAME="mcrypt-polyfill/$PHP_VERSION-mcrypt"
    fi

    # Set up any additional arguments that we're going to pass to PHPunit.
    PHPUNIT_EXTRA_ARGS=""

    # If we're on an environment where COVERALLS is enabled, turn on code coverage
    # tracking for the test run.
    if [[ $COVERALLS == "1" ]]; then
        PHPUNIT_EXTRA_ARGS="$PHPUNIT_EXTRA_ARGS --coverage-clover=coverage.xml"
    fi

    # Build the image.
    echo "Building Docker image for test run..."
    docker build -t "$IMAGE_NAME" "$TESTPATH"

    # Run phpunit inside the image that was just built.
    echo "Running test inside Docker container..."
    docker run -v "$TRAVIS_BUILD_DIR:/opt/src" \
        -w "/opt/src" \
        "$IMAGE_NAME" \
        ./vendor/bin/phpunit \
        --testsuite $PHP_VERSION \
        --colors=always \
        $PHPUNIT_EXTRA_ARGS
}


case "$1" in
    # ./util.sh local-test
    'local-test')
        echo "Current PHP version:" `php -r "echo phpversion();"`
        echo "Mcrypt enabled     :" `php -r "echo extension_loaded('mcrypt');"`
        ./vendor/bin/phpunit --colors=always
        ;;

    # ./util.sh run-test
    'run-test')
        requireDocker
        runTest
        ;;

    # ./util.sh run-all-tests
    'run-all-tests')
        requireDocker
        echo "Running all tests. This may take a while."
        for phpVersion in "5.4" "5.5" "5.6" "7.0"; do
            for enableMcrypt in "0" "1"; do
                PHP_VERSION=$phpVersion ENABLE_MCRYPT=$enableMcrypt runTest
            done
        done
        ;;

    # ./util.sh upload-coverage
    'upload-coverage')
        echo "Sending code coverage information to Coveralls."
        ./vendor/bin/coveralls -v
        ;;

    # ./util.sh [anything else or nothing]
    # Just output the usage information.
    *)
        cat <<EOT
Usage:
./util.sh [command]

Provides functionality for working with the mcrypt-polyfill codebase, mainly
focused on running tests.

Commands:

local-test:
  Just run the tests on your current environment. No attempt will be made to
  enable/disable mcrypt or change the PHP version.

run-test:
  Runs a single test for mcrypt-polyfill. Depends on values for \$PHP_VERSION and
  \$ENABLE_MCRYPT having values to set up the environment.

  Allowed values for \$PHP_VERSION: 5.4, 5.5, 5.6, 7.0
  Allowed values for \$ENABLE_MCRYPT: 0, 1

run-all-tests:
  Runs tests for all permutations of \$PHP_VERSION and \$ENABLE_MCRYPT. Note that
  this is a local utility. It is not used for CI tests for mcrypt-polyfill.

EOT
        ;;

esac

