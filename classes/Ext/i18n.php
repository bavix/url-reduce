<?php

namespace Ext;

class i18n extends Config
{

    protected $lang  = null;
    protected $langs = null;

    /**
     * @param $path  string
     * @param $value string
     *
     * @return array|mixed|string
     */
    public function get()
    {
        $p = func_get_args();

        $keys       = explode('.', $p[0]);
        $group_name = array_shift($keys);
        $group      = $this->get_group($group_name);

        if (empty($keys))
        {
            return $group;
        }

        $total = count($keys);
        foreach ($keys as $i => $key)
        {
            if (isset($group[$key]))
            {
                if ($i == $total - 1)
                {
                    return $group[$key];
                }
                $group = &$group[$key];
            }
            else if (isset($p[1]))
            {
                return $p[1];
            }
        }

        return '';

    }

    public function getLanguagesList()
    {
        return $this->langs;
    }

    /**
     * Constructs a config handler
     *
     * @param \App\Pixie $pixie Pixie dependency container
     *
     * @throws \Exception
     */
    public function __construct($pixie)
    {
        parent::__construct($pixie);

        $this->lang  = $pixie->config->get('i18n.default', null);
        $this->langs = $pixie->config->get('i18n.list', []);

        if ($lang = $pixie->cookie->get('lang'))
        {
            if (in_array($lang, $this->langs))
            {
                $this->lang = $lang;
            }
        }
        else
        {
            $pixie->cookie->set(
                'lang',
                $this->lang,
                $pixie->config->get('i18n.lifetime', null)
            );
        }

    }

    /**
     * Loads a group configuration file it has not been loaded before and
     * returns its options. If the group doesn't exist creates an empty one
     *
     * @param string $name Name of the configuration group to load
     *
     * @return array    Array of options for this group
     */
    public function get_group($name)
    {

        if (!isset($this->groups[$name]))
        {
            $file = $this->pixie->find_file('locals/' . $this->lang, $name, 'yml');
            $this->load_group($name, $file);
        }

        return $this->groups[$name]['options'];
    }

    /**
     * Loads group from file
     *
     * @param string $name Name to assign the loaded group
     * @param string $file File to load
     */
    public function load_group($name, $file)
    {

        if (!empty($file))
        {
            $options = $this->yml->parse(file_get_contents($file));
            if (!is_array($options))
            {
                $options = array();
            }
        }
        else
        {
            $options = array();
            $file    = $this->pixie->root_dir . 'assets/locals/' . $this->lang . '/' . $name . '.yml';
        }

        $this->groups[$name] = array(
            'file'    => $file,
            'options' => $options
        );

    }

}