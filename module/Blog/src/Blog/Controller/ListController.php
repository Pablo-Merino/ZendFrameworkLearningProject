<?php
/**
 * <strong>Name :  ListController.php</strong><br>
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
namespace Blog\Controller;

/**
 * Class ListController
 *
 * @category   Hola-frontend
 * @package Blog\Controller
 * @subpackage ListController
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Zend\Mvc\Controller\AbstractActionController;
use Blog\Service\PostServiceInterface;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController {
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
           'posts' => $this->postService->findAllPosts()
        ));
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $post = $this->postService->findPost($id);
        } catch(\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }

        return new ViewModel(array(
            'post' => $post
        ));
    }
}