<?php

namespace Ext;

use Symfony\Component\Yaml\Yaml;

/**
 * Handles retrieving of the configuration options.
 * You can add configuration files to /assets/config folder
 * and later access them via the get() method.
 *
 * @package Core
 */
class Config extends \PHPixie\Config
{

    /**
     * @var Yaml
     */
    protected $yml;

    /**
     * Constructs a config handler
     *
     * @param \PHPixie\Pixie $pixie Pixie dependency container
     */
    public function __construct($pixie)
    {
        parent::__construct($pixie);
        $this->yml = new Yaml();
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
            $file = $this->pixie->find_file('config', $name, 'yml');
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
            $file    = $this->pixie->root_dir . 'assets/config/' . $name . '.yml';
        }

        $this->groups[$name] = array(
            'file'    => $file,
            'options' => $options
        );

    }

    /**
     * Writes a configuration group back to the file it was loaded from
     *
     * @param string $group Name of the group to write
     */
    public function write($group)
    {
        $this->get_group($group);
        $group = $this->groups[$group];
        file_put_contents($group['file'], "");
    }

}
