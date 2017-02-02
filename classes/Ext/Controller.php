<?php

namespace Ext;


use App\Controller\Error;

abstract class Controller extends \PHPixie\Controller
{

    public abstract function next($data);

    /**
     * Runs the appropriate action.
     * It will execute the before() method before the action
     * and after() method after the action finishes.
     *
     * @param string $action Name of the action to execute.
     *
     * @return void
     * @throws \PHPixie\Exception\PageNotFound If the specified action doesn't exist
     */
    public function run($action)
    {

        $action .= 'Action';

        if (!method_exists($this, $action))
        {
            //throw new \PHPixie\Exception\PageNotFound("Method {$action} doesn't exist in " . get_class($this));

            if (!($this instanceof Error))
            {
                $controller = new Error($this->pixie);
            }
            else
            {
                $controller = $this;
            }

            $controller->run('default');

            return;
        }

        if (!$this->request)
        {
            $this->request = $this->pixie->request($this->pixie->router->get('error404'));
        }

        if ((int)$this->request->param('__API__'))
        {
            die('Not found!');
        }

        $data          = null;
        $this->execute = true;

        $this->before();

        if ($this->execute)
        {
            $data = $this->$action();
        }

        if ($this->execute)
        {
            $this->next($data);
        }

    }

}
