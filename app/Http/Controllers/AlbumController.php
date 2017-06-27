<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PageModel;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         */
        $query = AlbumModel::query();
        $query->orderBy('id', 'desc');
        $query->where('active', 1);

        return view('album.index', [
            'items' => $query->paginate(10),
            'title' => 'Альбомы',
            'description' => 'Список альбомов'
        ], $this->mergeData());
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $model = AlbumModel::query()
            ->where('active', 1)
            ->find($id);

        \abort_if(!$model, 404);

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        return view('album.view', [
            'item' => $model,
            'title' => $model->title . ' - Альбомы',
            'description' => $model->description
        ], $this->mergeData());
    }

}
