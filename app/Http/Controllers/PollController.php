<?php

namespace App\Http\Controllers;

use App\Models\AnswerModel;
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
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $model = PollModel::query()
            ->where('active', 1)
            ->find($id);

        \abort_if(!$model, 404);

        if ($request->url() !== $model->url())
        {
            // seo
            return redirect($model->url(), 301);
        }

        $count  = $model->questions()->count();
        $result = $request->cookie('poll_' . $id);

        if ($request->method() === 'POST')
        {
            $questions = $request->input()['questions'] ?? [];

            if (count($questions) === $count)
            {
                $result = \json_encode($questions);
                $this->setCookie('poll_' . $id, $result);

                // todo : replace on raw query
                foreach ($model->questions as $question)
                {
                    /**
                     * @var $answer AnswerModel
                     */
                    $answer = $question->answers
                        // if question not found
                        ->where('id', $questions[$question->id] ?? -1)
                        ->first();

                    $answer->count++;
                    $answer->save();

                    $question->count++;
                    $question->save();
                }
            }
        }

        if ($result)
        {
            $result = \json_decode($result, true);

            if ($count !== count($result))
            {
                $result = null;
            }
        }

        return $this->render($result ? 'poll.result' : 'poll.view', [
            'item'   => $model,
            'title'  => $model->title . ' - Опрос',
            'result' => $result
        ], $this->mergeData());

    }

}
