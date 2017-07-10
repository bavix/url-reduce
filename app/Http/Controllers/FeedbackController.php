<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
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
            'title'       => 'Обратная связь',
            'description' => 'Обратная связь'
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

        $item = new Feedback();

        if (empty($data['communication']) || empty($data['content']) || empty($data['name']))
        {
            return ['result' => false];
        }

        $item->name          = $data['name'];
        $item->communication = $data['communication'];
        $item->content       = \strip_tags($data['content']);

        return ['result' => $item->save()];
    }

}
