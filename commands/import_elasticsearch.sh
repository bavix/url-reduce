#!/usr/bin/env bash
cd ..
./artisan scout:import "App\Models\AlbumModel"
./artisan scout:import "App\Models\PageModel"
./artisan scout:import "App\Models\PollModel"
./artisan scout:import "App\Models\NewModel"
