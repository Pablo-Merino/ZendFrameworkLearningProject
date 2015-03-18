<?php
/**
 * <strong>Name :  PostForm.php</strong><br>
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
namespace Blog\Form;

/**
 * Class PostForm
 *
 * @category   Hola-frontend
 * @package Blog\Form
 * @subpackage PostForm
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Zend\Form\Form;

class PostForm extends Form {
    public function __construct()
    {
        $this->add(array(
            'name' => 'post-fieldset',
            'type' => 'Blog\Form\PostFieldset'
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Insert new Post'
            )
        ));
    }
}