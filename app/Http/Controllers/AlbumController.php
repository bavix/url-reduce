<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use Illuminate\Http\Request;

class AlbumController extends NewController
{

    protected $model       = AlbumModel::class;
    protected $withModel   = ['image'];
    protected $isCategory  = false;
    protected $route       = 'album';
    protected $title       = 'Альбомы';
    protected $description = 'Список альбомов';

}
