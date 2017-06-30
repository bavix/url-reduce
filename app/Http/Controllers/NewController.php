<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\NewModel;
use Illuminate\Http\Request;

class NewController extends Controller
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

        $name = $request->route()->getName();

        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         */
        $query = NewModel::with(['image', 'category']);

        $query->orderBy('id', 'desc');
        $query->where('active', 1);

        if ($name === 'new.category' && is_numeric($id))
        {
            $category = CategoryModel::query()->find($id);
            \abort_if( $category === null, 404);

            $query->where('category_id', $id);

            if ($request->url() !== $category->url())
            {
                // seo
                return redirect($category->url(), 301);
            }
        }

        return view('new.index', [
            'items' => $query->paginate(10),
            'title' => 'Новости',
            'description' => 'Список новостей'
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
        $model = NewModel::query()
            ->where('active', 1)
            ->find($id);

        \abort_if(!$model, 404);

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        return view('new.view', [
            'item' => $model,
            'title' => $model->title . ' - Новости',
            'description' => $model->description
        ], $this->mergeData());
    }

}
