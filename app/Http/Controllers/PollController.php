<?php

namespace App\Http\Controllers;

use App\Models\PollModel;
use Illuminate\Http\Request;

class PollController extends Controller
{

    protected $cookies = [];

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

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        if ($request->method() === 'POST')
        {
            $count     = $model->questions()->count();
            $questions = $request->input()['questions'] ?? [];

            if (count($questions) === $count)
            {
                $this->setCookie('poll_' . $id, \json_encode($questions));
            }
        }

        $view = view('poll.view', [
            'item' => $model,
            'title' => $model->title . ' - Опрос'
        ], $this->mergeData());

        $response = new \Illuminate\Http\Response($view);

        if (!empty($this->cookies))
        {
            foreach ($this->cookies as $cookie)
            {
                $response->withCookie($cookie);
            }
        }

        return $response;
    }

    /**
     * @param array ...$arguments
     */
    public function setCookie(...$arguments)
    {
        if (!isset($arguments[2]))
        {
            $arguments[2] = 365 * (24) * 60;
        }

        $this->cookies[] = \cookie(...$arguments);
    }

}
