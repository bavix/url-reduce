<?php

namespace App\Http\Controllers;

use App\Models\FeedbackModel;
use Illuminate\Http\Request;

class FeedbackController extends Controller
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
        return view('feedback.index', [
            'title' => 'Обратная связь'
        ], $this->mergeData());
    }

    /**
     * @param Request $request
     *
     * @return array|bool
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $item = new FeedbackModel();

        if (empty($data['communication']) || empty($data['content']))
        {
            return ['result' => false];
        }

        $item->communication = $data['communication'];
        $item->content       = $data['content'];

        return ['result' => $item->save()];
    }

}
