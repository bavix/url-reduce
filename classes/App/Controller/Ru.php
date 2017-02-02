<?php

namespace App\Controller;

class Ru extends Shorten
{

    public function defaultAction()
    {
        $this->pixie->cookie->set('lang', 'ru');

        $this->redirect('/');
        // return parent::defaultAction();
    }

}