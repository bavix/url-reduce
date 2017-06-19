<?php

if (!function_exists('active'))
{

    /**
     * @param array|string $route
     *
     * @return bool
     */
    function active($route)
    {
        $object = request()->route();

        return $object && in_array($object->action['as'], (array)$route, true);
    }

}

if (!function_exists('activeClass'))
{

    /**
     * @param string|array $route
     *
     * @return string
     */
    function activeClass($route)
    {
        return active($route) ? 'active' : '';
    }

}

if (!function_exists('visually'))
{

    /**
     * @return bool
     */
    function visually()
    {
        return request()->cookie(__FUNCTION__);
    }

}

if (!function_exists('visuallyImage'))
{

    /**
     * @return bool
     */
    function visuallyImage()
    {
        return request()->cookie(__FUNCTION__);
    }

}

if (!function_exists('visuallyFont'))
{

    /**
     * @return bool
     */
    function visuallyFont()
    {
        return request()->cookie(__FUNCTION__) ?: 20;
    }

}

if (!function_exists('visuallyColor'))
{

    /**
     * @return bool
     */
    function visuallyColor()
    {
        return request()->cookie(__FUNCTION__) ?: 'black-white';
    }

}

if (!function_exists('visuallyFontString'))
{

    /**
     * @return bool
     */
    function visuallyFontString($type)
    {
        $data = visuallyFont();

        return (int)$data === $type ? 'active' : '';
    }

}

if (!function_exists('visuallyColorString'))
{

    /**
     * @return bool
     */
    function visuallyColorString($type)
    {
        $data = visuallyColor();

        return $data === $type ? 'active' : '';
    }

}
