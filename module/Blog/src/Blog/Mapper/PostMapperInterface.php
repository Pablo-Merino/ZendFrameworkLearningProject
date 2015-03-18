<?php
/**
 * <strong>Name :  PostMapperInterface.php</strong><br>
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
namespace Blog\Mapper;

/**
 * Class PostMapperInterface
 *
 * @category   Hola-frontend
 * @package Blog\Mapper
 * @subpackage PostMapperInterface
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
use Blog\Model\PostInterface;

interface PostMapperInterface {
    /**
     * Find a post
     *
     * @param $id
     *
     * @access
     * @return mixed
     */
    public function find($id);

    /**
     * Retrieve all the posts
     *
     *
     * @access
     * @return mixed
     */
    public function findAll();
}