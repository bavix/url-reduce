#!/usr/bin/env bash
cd ..
./artisan scout:mysql-index "App\Models\AlbumModel"
./artisan scout:mysql-index "App\Models\PageModel"
./artisan scout:mysql-index "App\Models\PollModel"
./artisan scout:mysql-index "App\Models\NewModel"
cd -
