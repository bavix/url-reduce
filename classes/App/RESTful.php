<?php

namespace App;

//http://docs.phalconphp.ru/ru/latest/reference/tutorial-rest.html

//http://stackoverflow.com/questions/12806386/standard-json-api-response-format
//http://eax.me/rest/
//http://www.tutorialspoint.com/restful/restful_introduction.htm

abstract class RESTful extends Page
{

    const OK    = 'OK';
    const FOUND = "FOUND";
    const ERROR = 'ERROR';

    private $_status   = self::OK;
    private $_messages = array();

    public function actionDefault()
    {
        $this->addMessage('Action not found');
    }

    public function addMessage($msg)
    {
        $this->_messages[] = $msg;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function run($action)
    {

        if (!$this->request->param('__API__'))
        {
            die('Not found!');
        }

        $action .= ucfirst(strtolower($this->request->method));

        if (!method_exists($this, $action))
        {
            $action = 'actionDefault';
        }

        $data          = [];
        $this->execute = true;

        $this->before();

        if ($this->execute)
        {
            $data = $this->$action(
                (in_array($this->request->method, ['GET', 'DELETE', 'HEAD']) ?
                    $this->request->get() :
                    $this->request->post()

                ) + $this->request->param()
            );
        }

        $_data = array(
            'status' => $this->_status
        );

        if (!empty($this->_messages))
        {
            $_data['messages'] = $this->_messages;
        }

        if (!empty($this->_messages))
        {
            $_data['messages'] = $this->_messages;
        }

        if (!empty($data))
        {
            $_data['data'] = $data;
        }

        if ($this->execute)
        {
            $this->next($_data);
        }

    }

}