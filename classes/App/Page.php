<?php

namespace App;

/**
 * Base controller
 *
 * @property-read \App\Pixie         $pixie Pixie dependency container
 * @property-read \PHPixie\Haml\View $view
 */
class Page extends \Ext\Controller
{

    private $_row = array();

    public function __get($name)
    {
        if (isset($this->_row[$name]))
        {
            return $this->_row[$name];
        }
        throw new \Exception("Property {$name} not found on " . get_class($this));
    }

    public function __set($name, $value)
    {
        switch ($name)
        {
            case 'view':
                $this->_row[$name] = $this->pixie->haml->get($value);
                break;

            case 'db':
                $this->_row[$name] = $this->pixie->database->get($value);
                break;
        }
    }

    public function next($data)
    {
        if (is_array($data))
        {
            $this->response->add_header('Content-Type: application/json; charset=utf-8');
            $this->response->body = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        else if (is_string($data) && json_decode($data))
        {
            $this->response->add_header('Content-Type: application/json; charset=utf-8');
            $this->response->body = $data;
        }
        else
        {
            try
            {
                if (is_object($this->view) && in_array('PHPixie\View', class_parents($this->view)))
                {
                    $this->response->body = $this->view->render();
                }
            }
            catch (\Exception $e)
            {
                $this->response->body = $data;
            }
        }
    }
}

