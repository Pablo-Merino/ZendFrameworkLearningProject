<?php
/**
 * <strong>Name :  PostFieldset.php</strong><br>
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
 * Class PostFieldset
 *
 * @category   Hola-frontend
 * @package Blog\Form
 * @subpackage PostFieldset
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */
use Zend\Form\Fieldset;

class PostFieldset extends Fieldset {
    public function __construct()
    {
        $this->add(array(
            'type' => 'hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'text',
            'options' => array(
                'label' => 'The Text'
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'title',
            'options' => array(
                'label' => 'Blog Title'
            )
        ));
    }
}