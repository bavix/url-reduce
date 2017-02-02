<?php

namespace App\Controller;

use App\Page;

class To extends Page
{

    public function defaultAction()
    {

        $hash = $this->request->param('hash');

        $link = $this->pixie->orm->query('link')
            ->where('hash', $hash)
            ->where('deleted', 0)
            ->findOne();

        $this->view = 'main';

        $this->view->i18n = $this->pixie->i18n;

        $this->view->title       = $this->pixie->i18n->get('to.title');
        $this->view->header      = $this->pixie->i18n->get('to.header');
        $this->view->lead        = $this->pixie->i18n->get('to.lead');
        $this->view->placeholder = $this->pixie->i18n->get('to.placeholder');
        $this->view->submit      = $this->pixie->i18n->get('to.submit');
        $this->view->referral    = $this->pixie->i18n->get('to.referral');
        $this->view->page404     = $this->pixie->i18n->get('to.404');

        $this->view->lang = $this->pixie->cookie->get('lang');

        if ($link)
        {
            // for analytics
            $analytic          = $this->pixie->orm->createEntity('analytic');
            $analytic->link_id = $link->id;
            $analytic->url_ref = $this->request->server('HTTP_REFERER');
            $analytic->save();

            if ($link->fast_redirect)
            {
                $this->redirect($link->url);

                return;
            }

            $this->view->subview = 'to';

            $redirect = $this->pixie->i18n->get('to.redirect');
            $redirect = sprintf($redirect, $link->url);

            $this->view->url        = $link->url;
            $this->view->isRedirect = true;

            $this->view->redirect = $redirect;
        }
        else
        {
            $this->view->title   = $this->view->page404;
            $this->view->subview = '404';
        }
    }

}