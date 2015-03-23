<?php
/**
 * <strong>Name :  DeleteController.php</strong><br>
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
 * Class DeleteController
 *
 * @category   Hola-frontend
 * @package Blog\Controller
 * @subpackage DeleteController
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

class DeleteController extends AbstractActionController {
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function deleteAction()
    {
        try {
            $post = $this->postService->findPost($this->params('id'));
        } catch (\InvalidArgumentException $e) {
            return $this->redirect()->toRoute('blog');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost('delete_confirmation', 'no');

            if ($del === 'yes') {
                $this->postService->deletePost($post);
            }

            return $this->redirect()->toRoute('blog');
        }

        return new ViewModel(array(
            'post' => $post
        ));
    }
}