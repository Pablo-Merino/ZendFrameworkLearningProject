<?php
/**
 * <strong>Name :  Post.php</strong><br>
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
 * Class Post
 *
 * @category   Hola-frontend
 * @package Blog\Model
 * @subpackage Post
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
class Post implements PostInterface {

    /**
     * The post's id
     *
     * @access
     * @var
     */
    protected $id;
    /**
     * The post's title
     *
     * @access
     * @var
     */
    protected $title;
    /**
     * The post's text
     *
     * @access
     * @var
     */
    protected $text;

    /**
     * Returns a post ID
     *
     *
     * @access
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a post title
     *
     *
     * @access
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns a post text
     *
     *
     * @access
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets a post ID
     *
     * @param $id
     *
     * @access
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Sets a post title
     *
     * @param $title
     *
     * @access
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Sets a post text
     *
     * @param $text
     *
     * @access
     * @return void
     */
    public function setText($text)
    {
        $this->text= $text;
    }
}