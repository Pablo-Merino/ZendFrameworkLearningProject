<?php
/**
 * <strong>Name :  Module.php</strong><br>
 * <strong>Desc :  </strong><br>
 *
 * PHP version 5.5
 *
 * @category  ZendBlargh
 * @package   
 * @author    pmerino <desarrollo@hola-internet.com>
 * @copyright 2015
 * @license   Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version   GIT: $Id$
 * @link      
 * @since     File available since Release 0.1.0
 */ 
namespace Blog;

/**
 * Class Module
 *
 * @category   Hola-frontend
 * @package Blog
 * @subpackage Module
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
class Module implements ConfigProviderInterface, AutoloaderProviderInterface {

    /**
     * From AutoloaderProviderInterface. Sets the autoloading policy
     *
     *
     * @access
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__
                )
            )
        );
    }

    /**
     * From ConfigProviderInterface. Sets the configuration file
     *
     *
     * @access
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }
}