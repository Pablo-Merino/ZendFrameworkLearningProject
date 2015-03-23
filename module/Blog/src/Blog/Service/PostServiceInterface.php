<?php
/**
 * <strong>Name :  PostServiceInterface.php</strong><br>
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
namespace Blog\Service;

/**
 * Class PostServiceInterface
 *
 * @category   Hola-frontend
 * @package Blog\Service
 * @subpackage PostServiceInterface
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Blog\Model\PostInterface;

interface PostServiceInterface {
    /**
     * Retrieves all the posts
     *
     *
     * @access
     * @return mixed
     */
    public function findAllPosts();

    /**
     * Finds a specified post
     *
     * @param $id
     *
     * @access
     * @return mixed
     */
    public function findPost($id);

    /**
     * Saves a post
     *
     * @param PostInterface $post
     *
     * @access
     * @return mixed
     */
    public function savePost(PostInterface $post);

    /**
     * Deletes a post
     *
     * @param PostInterface $post
     *
     * @access
     * @return mixed
     */
    public function deletePost(PostInterface $post);
}