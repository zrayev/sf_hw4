#!/usr/bin/env bash
# -----------------------------------------------------------------------------
#          FILE:  install.sh
#   DESCRIPTION:  Install packages.
#       VERSION:  1.0
# -----------------------------------------------------------------------------

echo "make a choice"
echo "1) install packages"
echo "2) add fixtures"
echo "3) run tests"
echo "4) log and cache"
echo "0) exit"

read command
case $command in
1)
    echo "install"
    npm install
    ./node_modules/.bin/bower install

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
    rm -rf composer.phar
    composer install

    ./node_modules/.bin/gulp
    gulp
    ./app/console doctrine:database:create
    ./app/console doctrine:schema:update --force
    ./app/console c:c
;;

2)
    echo "add fixtures"
    ./app/console doctrine:schema:update --force
    ./app/console h:d:f:l
;;

3)
    echo "run tests"
    ./bin/phpunit -c app
    sleep 5
;;

4)
    echo "log and cache"
    rm -rf var/cache/*
    rm -rf var/logs/*

    HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
    sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs
    sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs
;;

0)
    exit 0
esac