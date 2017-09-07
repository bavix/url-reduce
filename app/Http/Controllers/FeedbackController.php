<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Link;
use App\Models\Report;
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
        throw new \Exception();
//        return view('feedback.index', [
//            'title'       => __('blocks.feedback'),
//            'description' => __('blocks.feedback')
//        ], $this->mergeData());
    }

    /**
     * @param Request $request
     *
     * @return array|bool
     */
    public function store(Request $request)
    {
        throw new \Exception();
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

    /**
     * @param Request $request
     *
     * @return array|string
     */
    public function report(Request $request)
    {
        $url = $request->input('url');

        if (empty($url))
        {
            return [
                'error' => 'URL is empty!'
            ];
        }

        $path = parse_url($url, PHP_URL_PATH);

        if (empty($path) || !preg_match('~(?:/s)?/(\w{5})~', $path, $matches))
        {
            return [
                'error' => 'Invalid URL!'
            ];
        }

        $link = Link::findByHash($matches[1]);

        if (!$link)
        {
            return [
                'error' => 'URL not found!'
            ];
        }

        $report          = new Report();
        $report->ip      = $request->ip();
        $report->link_id = $link->id;
        $report->save();

        return [
            // todo __(...)
            'title'   => 'Thank you!',
            'content' => 'The link will be checked in the next 48 hours.'
        ];
    }

}
