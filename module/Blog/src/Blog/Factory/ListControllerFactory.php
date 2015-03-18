<?php
/**
 * <strong>Name :  ListControllerFactory.php</strong><br>
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
 * Class ListControllerFactory
 *
 * @category   Hola-frontend
 * @package Blog\Factory
 * @subpackage ListControllerFactory
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return ListController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService =  $realServiceLocator->get('Blog\Service\PostServiceInterface');

        return new ListController($postService);
    }
}