<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\NewModel;
use Encore\Admin\Auth\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{

    protected $model       = NewModel::class;
    protected $withModel   = ['image', 'category'];
    protected $isCategory  = true;
    protected $route       = 'new';
    protected $title       = 'Новости';
    protected $description = 'Список новостей';

    protected $mainPage = false;
    protected $preview  = false;

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
        $query = $model::search($request->query('query'));

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

        if ($this->mainPage)
        {
            $query->where('main_page', 0);
        }

        $paginate = $query->paginate(10);
        $paginate->load($this->withModel);

        abort_if($paginate->lastPage() && $paginate->isEmpty(), 404);

        return view('new.index', [
            'items'       => $paginate,
            'title'       => $this->title,
            'description' => $this->description,
            'message'     => 'В разделе "' . $this->title . '" ничего не найдено!',
            'searchBar'   => true,
        ], $this->mergeData());
    }

    public function preview(Request $request, $id)
    {
        abort_if(!Auth::guard('admin')->user(), 404);

        $this->preview = true;

        return $this->view($request, $id);
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
        $model     = $modelName::query();

        if (!$this->preview)
        {
            $model->where('active', 1);
        }

        $model = $model->find($id);

        \abort_if(!$model, 404);

        if (!$this->preview && $request->getPathInfo() !== '/' && $request->url() !== $model->url())
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
