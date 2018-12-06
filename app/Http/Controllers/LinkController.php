<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashRequest;
use App\Http\Requests\UrlRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
     * @return Response
     */
    public function qr(HashRequest $request, string $hash): Response
    {
        $link = Link::findByHash($hash);
        $this->commonAbort($link);

        /**
         * @var $qr \SimpleSoftwareIO\QrCode\BaconQrCodeGenerator
         */
        $qr = QrCode::format('png');

        $png = $qr
            ->size(160)
            ->margin(0)
            ->color(1, 0, 2)
            ->merge(resource_path('images/logo.png'), .3, true)
            ->generate(route('direct', [$hash]));

        return response($png, 200, ['Content-Type' => 'image/png'])
            ->setExpires(Carbon::now()->addYear());
    }

    /**
     * @param HashRequest $request
     * @param string $hash
     * @return \Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function redirect(HashRequest $request, string $hash)
    {
        $link = Link::findByHash($hash);
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
