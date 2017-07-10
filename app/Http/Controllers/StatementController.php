<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use App\Models\Type;
use Carbon\Carbon;
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
        $types = Type::query()
            ->where('active', 1)
            ->get();

        return view('statement.index', [
            'types'       => $types,
            'title'       => 'Подать заявление',
            'description' => 'Подать заявление'
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

        if (count($data) <= 16)
        {
            return ['result' => false];
        }

        $item = new Statement();

        foreach ($data as $key => $value)
        {
            $data[$key] = trim($value);
        }

        $item->parent_name = $data['parent_name'];
        $item->phone       = $data['phone'];

        $item->passport_serial = $data['passport_serial'];
        $item->passport_number = $data['passport_number'];
        $item->passport_from   = $data['passport_from'];
        $item->passport_date   = Carbon::createFromFormat('d.m.Y', $data['passport_date'])
            ->toDateString();

        $item->passport_division = $data['passport_division'];

        $item->registration_address = $data['registration_address'];
        $item->residential_address  = isset($data['auto_address']) ?
            $data['registration_address'] :
            $data['residential_address'];

        $item->children_name       = $data['children_name'];
        $item->children_doc_type   = $data['children_doc_type'];
        $item->children_doc_serial = $data['children_doc_serial'];
        $item->children_doc_number = $data['children_doc_number'];
        $item->children_school     = $data['children_school'];
        $item->children_сlass      = $data['children_сlass'];

        $item->type_id = $data['type_id'];

        return ['result' => $item->save()];
    }

}
