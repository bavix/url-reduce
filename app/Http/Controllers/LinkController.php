<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashRequest;
use App\Http\Requests\UrlRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

class LinkController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $count = Link::live()->count();
        return view('app', compact('count'));
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function live(): AnonymousResourceCollection
    {
        $collection = Link::live()
            ->limit(5)
            ->get();

        return LinkResource::collection($collection);
    }

    /**
     * @param UrlRequest $request
     * @return LinkResource
     */
    public function store(UrlRequest $request): LinkResource
    {
        $url = $request->input('url');
        $link = Link::produce($url);
        $this->commonAbort($link);
        return new LinkResource($link);
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
