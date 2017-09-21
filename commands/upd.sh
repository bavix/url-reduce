#!/usr/bin/env bash
cd ..
./artisan down
git pull
composer upd
./artisan migrate
./artisan up
cp -r vendor/encore/laravel-admin/resources/views/* resources/views/vendor/admin/
