<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tracker;
use Bavix\Helpers\JSON;
use Bavix\Helpers\Str;
use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *   schemes={"https"},
 *   host="ln4.ru",
 *   basePath="/api"
 * )
 */

/**
 * @SWG\Info(title="Shorter API", version="0.1")
 * @SWG\Path(
 *   path="/add"
 * )
 */
class ShorterController extends Controller
{

    const ERR_EMPTY               = 100;
    const ERR_REDUCE_REDUCED      = self::ERR_EMPTY + 1;
    const ERR_SCHEME_FORBIDDEN    = self::ERR_REDUCE_REDUCED + 1;
    const ERR_VALIDATE_URL        = self::ERR_SCHEME_FORBIDDEN + 1;
    const ERR_DOMAIN_FIRST_LEVEL  = self::ERR_VALIDATE_URL + 1;
    const ERR_REFERENCE_TOO_SHORT = self::ERR_DOMAIN_FIRST_LEVEL + 1;
    const ERR_NO_ALLOW            = self::ERR_REFERENCE_TOO_SHORT + 1;

    /**
     * @SWG\Get(
     *   tags={"Add URL"},
     *   summary="Add URL in Shorter URL",
     *   path="/add",
     *   @SWG\Parameter(
     *     name="url",
     *     in="query",
     *     description="URL parameter",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="If url is valid",
     *     @SWG\Schema(
     *        type="object",
     *        @SWG\Property(property="hash", type="string")
     *     )
     *   )
     * )
     * @SWG\Post(
     *   tags={"Add URL"},
     *   summary="Add URL in Shorter URL",
     *   path="/add",
     *   @SWG\Parameter(
     *     name="url",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Link")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="If url is valid",
     *     @SWG\Schema(
     *        type="object",
     *        @SWG\Property(property="hash", type="string")
     *     )
     *   )
     * )
     */
    public function store(Request $request)
    {
        $idn = new \idna_convert(['idn_version' => 2008]);
        $url = trim((string)$request->input('url'));

        if (empty($url))
        {
            return [
                'code'  => self::ERR_EMPTY,
                'error' => __('blocks.shorten.empty')
            ];
        }

        $test = $idn->encode($url);
        $host = $idn->encode($request->getHost());

        $scheme = parse_url($host, PHP_URL_SCHEME);

        if ($scheme && !preg_match('~^https?$~', $scheme))
        {
            return [
                'code'  => self::ERR_SCHEME_FORBIDDEN,
                'error' => __('blocks.shorten.schemeForbidden', ['scheme' => $scheme])
            ];
        }

        $regExp = '~^(https?://)?(www\.)?' . preg_quote($host, '~') . '(/.*)?$~iu';

        if (preg_match($regExp, $test))
        {
            return [
                'code'  => self::ERR_REDUCE_REDUCED,
                'error' => __('blocks.shorten.reduceTheReduced')
            ];
        }

        if (!preg_match('~^https?://~', $url))
        {
            $url  = 'http://' . $url;
            $test = $idn->encode($url);
        }

        if (!filter_var($test, FILTER_VALIDATE_URL))
        {
            return [
                'code'  => self::ERR_VALIDATE_URL,
                'error' => __('blocks.shorten.validateUrl')
            ];
        }

        $host = parse_url($test, PHP_URL_HOST);

        if (!preg_match('~.+\..{2,}~', $host))
        {
            return [
                'code'  => self::ERR_DOMAIN_FIRST_LEVEL,
                'error' => __('blocks.shorten.domainFirstLevel')
            ];
        }

        // check cyrillic's
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

        // decode for API
        $model->parameters = JSON::decode($model->parameters);

        return $model->setVisible([
            'hash',
            'parameters',
        ]);
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
