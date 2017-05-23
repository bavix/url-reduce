<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use App\Models\PollModel;
use Illuminate\Http\Request;

class PollController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         */
        $query = PollModel::query();
        $query->orderBy('id', 'desc');
        $query->where('active', 1);

        return view('new.index', [
            'items' => $query->paginate(10),
            'title' => 'Опросы'
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
        $model = PollModel::query()->find($id);
        \abort_if(!$model, 404);

        return view('poll.view', [
            'item' => $model,
            'title' => $model->title . ' - Опрос'
        ], $this->mergeData());
    }

}
