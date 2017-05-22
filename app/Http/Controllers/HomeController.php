<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $query = NewModel::with(['category']);

        return view('home.index', [
            'items' => $query->paginate(10)
        ], $this->mergeData());
    }

}
