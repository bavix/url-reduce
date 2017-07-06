#!/usr/bin/env bash
cd ..; ./artisan down; git pull; composer upd; ./artisan migrate; ./artisan up; cd -
