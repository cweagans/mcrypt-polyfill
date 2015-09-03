#!/usr/bin/env bash

if [[ $ENABLE_MCRYPT == "1" ]]
then
    TESTPATH="tests/docker/$PHP_VERSION-mcrypt"
    IMAGE_NAME="mcrypt-polyfill/$PHP_VERSION-mcrypt"
else
    TESTPATH="tests/docker/$PHP_VERSION"
    IMAGE_NAME="mcrypt-polyfill/$PHP_VERSION"
fi

docker build -t "$IMAGE_NAME" "$TESTPATH"
docker run -v "$TRAVIS_BUILD_DIR:/opt/src" -w "/opt/src" "$IMAGE_NAME" ./vendor/bin/phpunit --testsuite $PHP_VERSION --colors=always
