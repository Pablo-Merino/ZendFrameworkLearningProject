<?php
/**
 * <strong>Name :  ZendDbSqlMapperFactory.php</strong><br>
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
namespace Blog\Factory;

/**
 * Class ZendDbSqlMapperFactory
 *
 * @category   Hola-frontend
 * @package Blog\Mapper
 * @subpackage ZendDbSqlMapperFactory
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Zend\ServiceManager\Exception;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

use Blog\Mapper\ZendDbSqlMapper;
use Blog\Model\Post;

class ZendDbSqlMapperFactory implements FactoryInterface, ServiceLocatorInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ZendDbSqlMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false),
            new Post()
        );
    }

    /**
     * Retrieve a registered instance
     *
     * @param  string $name
     *
     * @throws Exception\ServiceNotFoundException
     * @return object|array
     */
    public function get($name)
    {
        // TODO: Implement get() method.
    }

    /**
     * Check for a registered instance
     *
     * @param  string|array $name
     *
     * @return bool
     */
    public function has($name)
    {
        // TODO: Implement has() method.
}}