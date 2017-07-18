<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tracker;
use Bavix\Helpers\JSON;
use Bavix\Helpers\Str;
use Illuminate\Http\Request;

class ShorterController extends Controller
{

    const ERR_EMPTY               = 100;
    const ERR_REDUCE_REDUCED      = self::ERR_EMPTY + 1;
    const ERR_SCHEME_FORBIDDEN    = self::ERR_REDUCE_REDUCED + 1;
    const ERR_VALIDATE_URL        = self::ERR_SCHEME_FORBIDDEN + 1;
    const ERR_DOMAIN_FIRST_LEVEL  = self::ERR_VALIDATE_URL + 1;
    const ERR_REFERENCE_TOO_SHORT = self::ERR_DOMAIN_FIRST_LEVEL + 1;
    const ERR_NO_ALLOW            = self::ERR_REFERENCE_TOO_SHORT + 1;

    public function store(Request $request)
    {
        $url = trim($request->input('url'));

        if (empty($url))
        {
            return [
                'code'  => self::ERR_EMPTY,
                'error' => __('blocks.shorten.empty')
            ];
        }

        if (stripos($url, $request->getHost()) !== false)
        {
            return [
                'code'  => self::ERR_REDUCE_REDUCED,
                'error' => __('blocks.shorten.reduceTheReduced')
            ];
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        if ($scheme && !preg_match('~^https?$~', $scheme))
        {
            return [
                'code'  => self::ERR_SCHEME_FORBIDDEN,
                'error' => __('blocks.shorten.schemeForbidden', ['scheme' => $scheme])
            ];
        }

        if (!preg_match('~^https?://~', $url))
        {
            $url = 'http://' . $url;
        }

        $idn    = new \idna_convert(['idn_version' => 2008]);
        $regExp = '~\b(https?://)?' . str_replace('.', '\\.', $idn->encode($request->getHost())) . '[^\w\.-]~i';

        if (!filter_var($idn->encode($url), FILTER_VALIDATE_URL) || preg_match($regExp, $idn->encode($url)))
        {
            return [
                'code'  => self::ERR_VALIDATE_URL,
                'error' => __('blocks.shorten.validateUrl')
            ];
        }

        $host = parse_url($url, PHP_URL_HOST);

        if (!preg_match('~.+\..{2,}~', $host))
        {
            return [
                'code'  => self::ERR_DOMAIN_FIRST_LEVEL,
                'error' => __('blocks.shorten.domainFirstLevel')
            ];
        }

        if (mb_strlen($url) <= (12 + ($scheme === 'https')))
        {
            return [
                'code'  => self::ERR_REFERENCE_TOO_SHORT,
                'error' => __('blocks.shorten.referenceTooShort')
            ];
        }

        $model = Link::addUrl($url);

        if (!$model->active)
        {
            return [
                'code'  => self::ERR_NO_ALLOW,
                'error' => __('blocks.shorten.noAllow')
            ];
        }

        return $model->setVisible(['hash']);
    }

    public function index(Request $request)
    {
        Tracker::hit();

        return $this->render('layouts.app');
    }

    public function hash(Request $request, $hash)
    {
        $model = Link::findByHash($hash);
        abort_if($model === null, 404);
        abort_if(!$model->active, 403, __('bavix.http.403_2'));

        Tracker::hit($model);

        return redirect($model->url);
    }

}
