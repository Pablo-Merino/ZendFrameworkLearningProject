<?php
/**
 * <strong>Name :  ZendDbSqlMapper.php</strong><br>
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
 * Class ZendDbSqlMapper
 *
 * @category   Hola-frontend
 * @package Blog\Mapper
 * @subpackage ZendDbSqlMapper
 * @author     Development <desarrollo@hola-internet.com>
 * @copyright  2013 Hola.com
 * @license    Apache 2 License http://www.apache.org/licenses/LICENSE-2.0.html
 * @version    Release: <0.1.0>
 * @link       http://www.hola.com
 * @since      Class available since Release 0.1.0
 */

use Blog\Model\PostInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;
use Zend\Stdlib\Hydrator\HydratorInterface;

class ZendDbSqlMapper implements PostMapperInterface {

    /**
     * @var \Zend\Db\Adapter\AdapterInterface
     */
    protected $dbAdapter;
    /**
     * @var \Zend\Stdlib\Hydrator\HydratorInterface
     */
    protected $hydrator;
    /**
     * @var \Blog\Model\PostInterface
     */
    protected $postPrototype;

    /**
     * @param AdapterInterface  $dbAdapter
     * @param HydratorInterface $hydrator
     * @param PostInterface     $postPrototype
     */
    public function __construct(
        AdapterInterface $dbAdapter,
        HydratorInterface $hydrator,
        PostInterface $postPrototype
    ) {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator= $hydrator;
        $this->postPrototype = $postPrototype;
    }

    /**
     * Find a post
     *
     * @param $id
     *
     * @access
     * @return mixed
     */
    public function find($id)
    {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select('posts');
        $select->where(array('id = ?' => $id));

        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(), $this->postPrototype);
        }

        throw new \InvalidArgumentException("Blog with given ID:{$id} not found.");
    }

    /**
     * Retrieve all the posts
     *
     *
     * @access
     * @return mixed
     */
    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('posts');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if($result instanceof ResultInterface && $result->isQueryResult())
        {
            $resultSet = new HydratingResultSet($this->hydrator, $this->postPrototype);
            return $resultSet->initialize($result);
        }
        return array();
    }

    /**
     * Saves a post
     *
     * @param PostInterface $post
     *
     * @access
     * @return mixed
     * @throws \Exception
     */
    public function save(PostInterface $post)
    {
        $postData = $this->hydrator->extract($post);
        unset($postData['id']);

        if ($post->getId())
        {
            $action = new Update('posts');
            $action->set($postData);
            $action->where(array('id = ?' => $post->getId()));
        } else {
            $action = new Insert('posts');
            $action->values($postData);
        }

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface)
        {
            if ($newId = $result->getGeneratedValue())
            {
                $post->setId($newId);
            }

            return $post;
        }

        throw new \Exception("Database error");
    }

    /**
     * Deletes a post
     *
     * @param PostInterface $post
     *
     * @access
     * @return mixed
     */
    public function delete(PostInterface $post)
    {
        $action = new Delete('posts');
        $action->where(array('id = ?' => $post->getId()));

        $sql    = new Sql($this->dbAdapter);
        $stmt   = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool)$result->getAffectedRows();
    }
}