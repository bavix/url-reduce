<?php

namespace App\Controller\API;

use App\RESTful;

class Shorten extends RESTful
{

    /**
     * @param $url
     *
     * @return int
     */
    public function httpCode($url)
    {
        $ch = curl_init();

        $options = array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_MAXREDIRS      => 10,
        );

        curl_setopt_array($ch, $options);
        curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode;
    }

    /**
     * @return array|mixed
     */
    public function addPost()
    {
        if ($this->request->post('key') !== '__ddos__' || !$this->request->is_ajax())
        {
            return [
                'link' => ''
            ];
        }

        $link = $this->request->post('link');
        $link = trim($link);

        $DDoS = $this->pixie->session->get('DDoS');

        if (empty($link) || strpos($link, ' ') ||
            $this->pixie->cookie->get('lang') === null ||
            $this->request->post('DDoS') !== $DDoS
        )
        {
            $this->setStatus(RESTful::ERROR);

            return $this->request->post();
        }

        if (strpos(strtolower($link), 'ln4.ru') !== false)
        {
            $this->setStatus(RESTful::ERROR);

            return [
                'link' => ''
            ];
        }

        $link    = str_replace('\/\/', ':\/\/', $link);
        $dataUrl = parse_url($link);

        if (!isset($dataUrl['scheme']))
        {
            $link = 'http://' . $link;
        }

        if ($this->httpCode($link) < 300)
        {

            $linkObject = $this->pixie->orm->query('link')
                ->where('url', $link)
                ->where('deleted', 0)
                ->findOne();

            if (!$linkObject)
            {
                $linkObject = $this->pixie->orm->createEntity('link');

                $builder = new \Deimos\Builder\Builder();
                $helper  = new \Deimos\Helper\Helper($builder);

                $linkObject->hash = $helper->str()->random(5);
                $linkObject->url  = $link;

                $linkObject->save();
            }

            return [
                'link' => 'https://ln4.ru/s/' . $linkObject->hash
            ];

        }

        $this->setStatus(RESTful::ERROR);

        return [
            'link' => ''
        ];

    }

}