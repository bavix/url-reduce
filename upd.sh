#!/usr/bin/env bash
./artisan down; git pull; composer upd; ./artisan migrate; ./artisan up
