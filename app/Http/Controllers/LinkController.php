<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashRequest;
use App\Http\Requests\UrlRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LinkController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('app');
    }

    /**
     * @param UrlRequest $request
     * @return Link|null
     */
    public function store(UrlRequest $request): Link
    {
        $url = $request->input('url');
        $link = Link::produce($url);
        $this->commonAbort($link);
        return $link;
    }

    /**
     * @param HashRequest $request
     * @param string $hash
     * @return \Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function redirect(HashRequest $request, string $hash)
    {
        /**
         * @var Link $link
         */
        $link = Link::query()
            ->where('hash', $hash)
            ->firstOrFail();

        abort_if($link->hash !== $hash, 404);
        $this->commonAbort($link);

        if ($link->isAdult()) {
            return view('adult', compact('link'));
        }

        if ($link->isWarning()) {
            return view('warning', compact('link'));
        }

        return redirect($link->url);
    }

    /**
     * @param Link $link
     */
    protected function commonAbort(Link $link): void
    {
        abort_if($link->blocked, 403, 'Link was blocked');
        abort_if(!$link->active, 403, 'The link is not active');
    }

}
