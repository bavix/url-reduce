#!/usr/bin/env bash
cd ..; ./artisan down; ./artisan db:seed --class=TestSeeder; ./artisan up
