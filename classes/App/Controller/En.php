<?php

namespace App\Controller;

class En extends Shorten
{

    public function defaultAction()
    {
        $this->pixie->cookie->set('lang', 'en');

        $this->redirect('/');
        // return parent::defaultAction();
    }

}