<?php
/**
 * <strong>Name :  PostInterface.php</strong><br>
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
namespace Blog\Model;

/**
 * Class PostInterface
 *
 * @category   Hola-frontend
 * @package Blog\Model
 * @subpackage PostInterface
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
interface PostInterface {
    /**
     * Returns a post ID
     *
     *
     * @access
     * @return mixed
     */
    public function getId();

    /**
     * Returns a post title
     *
     *
     * @access
     * @return mixed
     */
    public function getTitle();

    /**
     * Returns a post text
     *
     *
     * @access
     * @return mixed
     */
    public function getText();
}