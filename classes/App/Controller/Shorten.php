<?php

namespace App\Controller;

class Shorten extends \App\Page
{

    public function defaultAction()
    {
        $defaultLang = $this->pixie->cookie->get('lang');

        $acceptLanguage = $this->request->server('HTTP_ACCEPT_LANGUAGE');

        if ($acceptLanguage && !$defaultLang)
        {
            $lang = substr($acceptLanguage, 0, 2);

            $this->pixie->cookie->set('lang', in_array($lang, ['en', 'ru']) ? $lang : 'en');
        }

        $this->view = 'main';

        $this->view->subview = 'shorten';

        $this->view->i18n = $this->pixie->i18n;

        $this->view->title       = $this->pixie->i18n->get('shorten.title');
        $this->view->header      = $this->pixie->i18n->get('shorten.header');
        $this->view->lead        = $this->pixie->i18n->get('shorten.lead');
        $this->view->placeholder = $this->pixie->i18n->get('shorten.placeholder');
        $this->view->submit      = $this->pixie->i18n->get('shorten.submit');
        $this->view->referral    = $this->pixie->i18n->get('shorten.referral');
        $this->view->lang        = $defaultLang;

        $this->view->DDoS = sha1(rand(1000, 99999));

        $this->pixie->session->set('DDoS', $this->view->DDoS);
    }

}
