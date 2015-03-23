<?php
/**
 * <strong>Name :  PostService.php</strong><br>
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
 * Class PostService
 *
 * @category   Hola-frontend
 * @package Blog\Service
 * @subpackage PostService
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
use Blog\Mapper\PostMapperInterface;
use Blog\Model\Post;
use Blog\Model\PostInterface;

class PostService implements PostServiceInterface {

    /**
     * Put a description here
     *
     * @access
     * @var PostMapperInterface
     */
    protected $postMapper;

    /**
     * @param PostMapperInterface $postMapper
     */
    public function __construct(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
    }
    /**
     * {@inheritDoc}
     */
    public function findAllPosts()
    {
        return $this->postMapper->findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function findPost($id)
    {
        return $this->postMapper->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function savePost(PostInterface $post)
    {
        return $this->postMapper->save($post);
    }

    /**
     * Deletes a post
     *
     * @param PostInterface $post
     *
     * @access
     * @return mixed
     */
    public function deletePost(PostInterface $post)
    {
        return $this->postMapper->delete($post);
    }
}