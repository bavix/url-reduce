<?php

namespace App\Http\Controllers;

use App\Models\StatementModel;
use App\Models\TypeModel;
use Illuminate\Http\Request;

class StatementController extends Controller
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
        $types = TypeModel::query()
            ->where('active', 1)
            ->get();

        return view('statement.index', [
            'types' => $types,
            'title' => 'Подать заявление'
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

        $item = new StatementModel();

        if (empty($data['communication']) || empty($data['content']) || empty($data['type_id']))
        {
            return ['result' => false];
        }

        $item->communication =  $data['communication'];
        $item->content       = \strip_tags($data['content']);
        $item->type_id       = $data['type_id'];
        $item->last_name     = $data['last_name'];
        $item->first_name    = $data['first_name'];

        return ['result' => $item->save()];
    }

}
