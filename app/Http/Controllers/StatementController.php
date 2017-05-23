<?php

namespace App\Http\Controllers;

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

}
