<?php

namespace App\Controller;

use App\Page;

class Error extends Page
{

    public function defaultAction()
    {

        $this->response->add_header(
            $this->request->server('SERVER_PROTOCOL', 'HTTP/1.1') . ' 404 Not Found'
        );

        $defaultLang = $this->pixie->cookie->get('lang');

        $acceptLanguage = $this->request->server('HTTP_ACCEPT_LANGUAGE');

        if ($acceptLanguage && !$defaultLang)
        {
            $lang = substr($acceptLanguage, 0, 2);

            $this->pixie->cookie->set('lang', in_array($lang, ['en', 'ru']) ? $lang : 'en');
        }

        $this->view = 'main';

        $this->view->i18n = $this->pixie->i18n;

        $this->view->title       = $this->pixie->i18n->get('to.title');
        $this->view->header      = $this->pixie->i18n->get('to.header');
        $this->view->lead        = $this->pixie->i18n->get('to.lead');
        $this->view->placeholder = $this->pixie->i18n->get('to.placeholder');
        $this->view->submit      = $this->pixie->i18n->get('to.submit');
        $this->view->referral    = $this->pixie->i18n->get('to.referral');
        $this->view->page404     = $this->pixie->i18n->get('to.404');
        $this->view->lang        = $defaultLang;

        $this->view->title   = $this->view->page404;
        $this->view->subview = '404';
    }

}