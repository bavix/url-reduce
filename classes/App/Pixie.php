<?php

namespace App;
use App\Controller\Error;

/**
 * @property-read \PHPixie\Haml   $haml   Haml module
 * @property-read \Ext\Config     $config Configuration handler
 * @property-read \Ext\i18n       $i18n   Localizations handler
 * @property-read \PHPixie\ORM    $orm    ORM
 * @property-read \PHPixie\Cookie $cookie Cookie
 */
class Pixie extends \PHPixie\Pixie
{

    protected $request   = null;
    protected $modules3x = array();

    public function __construct()
    {
        $this->instance_classes['config'] = '\Ext\Config';
    }

    public function http_request()
    {
        if ($this->request)
        {
            return $this->request;
        }
        $this->request = parent::http_request();

        return $this->request;
    }

    public function __get($name)
    {

        if (isset($this->instances[$name]))
        {
            return $this->instances[$name];
        }

        if (isset($this->instance_classes[$name]))
        {
            return $this->instances[$name] = new $this->instance_classes[$name]($this);
        }

        if (isset($this->modules[$name]))
        {
            return $this->instances[$name] = new $this->modules[$name]($this);
        }

        if (in_array($name, array_keys($this->modules3x)))
        {

            switch ($this->modules3x[$name])
            {

                case '\PHPixie\Database':
                    $this->instances[$name] = new $this->modules3x[$name]($this->slice->arrayData(
                        $this->config->get('database')
                    ));
                    break;

                case '\PHPixie\ORM':
                    $this->instances[$name] = new $this->modules3x[$name]($this->database, $this->slice->arrayData(
                        $this->config->get('orm')
                    ));
                    break;

                case '\PHPixie\HTTP':
                    $this->instances[$name] = new $this->modules3x[$name]($this->slice);
                    break;

                default:
                    $this->instances[$name] = new $this->modules3x[$name]();

            }

            return $this->instances[$name];

        }

        throw new \Exception("Property {$name} not found on " . get_class($this));

    }

    protected function after_bootstrap()
    {
        $this->modules   = $this->config->get('config.modules.2-dev', []);
        $this->modules3x = $this->config->get('config.modules.3-dev', []);

        mb_internal_encoding(
            $this->config->get('config.encoding', 'UTF-8'));

        date_default_timezone_set(
            $this->config->get('config.timezone', 'Europe/Moscow'));
    }

    public function controller($class)
    {

        $request = $this->http_request();
        if ((bool)$request->param('__API__'))
        {
            $controller = ucfirst($request->param('controller'));
            $class      = str_replace(
                "\\Controller\\" . $controller,
                "\\Controller\\API\\" . $controller,
                $class
            );
        }

        if (!class_exists($class))
        {
//            throw new \PHPixie\Exception\PageNotFound("Class {$class} doesn't exist");
            $this->request = $request;
            $controller    = new Error($this);

            return $controller;
        }

        return new $class($this);

    }

    /**
     * Bootstraps the project
     *
     * @param  string $root_dir Root directory of the application
     *
     * @return $this
     */
    public function bootstrap($root_dir)
    {

        $this->root_dir      = rtrim($root_dir, '/') . '/';
        $this->app_namespace = __NAMESPACE__ . '\\';

        $this->set_asset_dirs();
        $this->debug->init();

        foreach ($this->config->get('routes') as $name => $rule)
        {
            $this->router->add(
                $this->route(
                    $name,
                    $rule[0],
                    $rule[1],
                    $this->arr($rule, 2, null)
                )
            );
        }

        foreach ($this->modules as $name => $class)
        {
            $this->$name = new $class($this);
        }

        $this->after_bootstrap();

        return $this;

    }

}