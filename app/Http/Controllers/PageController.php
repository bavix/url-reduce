<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PageModel;
use Illuminate\Http\Request;

class PageController extends Controller
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
        $query = PageModel::query();
        $query->orderBy('id', 'desc');
        $query->where('active', 1);

        return view('page.index', [
            'items' => $query->paginate(10),
            'title' => 'Страницы'
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
        $model = NewModel::query()->find($id);
        \abort_if(!$model, 404);

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        return view('page.view', [
            'item' => $model,
            'title' => $model->title . ' - Страницы'
        ], $this->mergeData());
    }

}
