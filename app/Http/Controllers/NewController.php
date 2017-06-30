<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\NewModel;
use Illuminate\Http\Request;

class NewController extends Controller
{

    protected $model       = NewModel::class;
    protected $withModel   = ['image', 'category'];
    protected $isCategory  = true;
    protected $route       = 'new';
    protected $title       = 'Новости';
    protected $description = 'Список новостей';

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {

        $name  = $request->route()->getName();
        $model = $this->model;

        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         */
        $query = $model::with($this->withModel);

        $query->orderBy('id', 'desc');
        $query->where('active', 1);

        if ($this->isCategory && $name === $this->route . '.category' && is_numeric($id))
        {
            $category = CategoryModel::query()->find($id);
            \abort_if($category === null, 404);

            $query->where('category_id', $id);

            if ($request->url() !== $category->url())
            {
                // seo
                return redirect($category->url(), 301);
            }
        }

        $paginate = $query->paginate(10);
        abort_if($paginate->lastPage() && !$paginate->total(), 404);

        $view = 'new.index';

        if (!$paginate->total())
        {
            $view = 'new.empty';
        }

        return view($view, [
            'items'       => $paginate,
            'title'       => $this->title,
            'description' => $this->description,
            'message'     => 'Раздел "' . $this->title . '" пуст!'
        ], $this->mergeData());
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $modelName = $this->model;
        $model     = $modelName::query()
            ->where('active', 1)
            ->find($id);

        \abort_if(!$model, 404);

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        return view('new.view', [
            'item'        => $model,
            'title'       => $model->title . ' - ' . $this->title,
            'description' => $model->description ?? ''
        ], $this->mergeData());
    }

}
