<?php
/**
 * <strong>Name :  WriteController.php</strong><br>
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
 * Class WriteController
 *
 * @category   Hola-frontend
 * @package Blog\Controller
 * @subpackage WriteController
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Blog\Service\PostServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\View;

class WriteController extends AbstractActionController {
    protected $postService;
    protected $postForm;

    public function __construct(
        PostServiceInterface $postService,
        FormInterface $postForm
    ) {
        $this->postService = $postService;
        $this->postForm = $postForm;
    }

    public function addAction()
    {
        $request = $this->getRequest();

        if($request->isPost())
        {
            $this->postForm->setData($request->getPost());
            if($this->postForm->isValid())
            {
                try {
                    $this->postService->savePost($this->postForm->getData());

                    return $this->redirect()->toRoute('blog');
                } catch(\Exception $e) {
                    // TODO: Actually catch this
                }
            }
        }
        return new ViewModel(array(
            'form' => $this->postForm
        ));
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $post = $this->postService->findPost($this->params('id'));

        $this->postForm->bind($post);

        if($request->isPost())
        {
            $this->postForm->setData($request->getPost());
            if($this->postForm->isValid())
            {
                try {
                    $this->postService->savePost($post);

                    return $this->redirect()->toRoute('blog');
                } catch(\Exception $ex) {
                    die($ex->getMessage());
                }
            }

        }

        return new ViewModel(array(
            'form' => $this->postForm
        ));
    }
}