<?php

namespace Map;

use \AnsweredQuestions;
use \AnsweredQuestionsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'answered_questions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnsweredQuestionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnsweredQuestionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'answered_questions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnsweredQuestions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnsweredQuestions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'answered_questions.id';

    /**
     * the column name for the Customer_id field
     */
    const COL_CUSTOMER_ID = 'answered_questions.Customer_id';

    /**
     * the column name for the Question_id field
     */
    const COL_QUESTION_ID = 'answered_questions.Question_id';

    /**
     * the column name for the Answer field
     */
    const COL_ANSWER = 'answered_questions.Answer';

    /**
     * the column name for the response field
     */
    const COL_RESPONSE = 'answered_questions.response';

    /**
     * the column name for the media_id field
     */
    const COL_MEDIA_ID = 'answered_questions.media_id';

    /**
     * the column name for the responded field
     */
    const COL_RESPONDED = 'answered_questions.responded';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'CustomerId', 'QuestionId', 'Answer', 'Response', 'MediaId', 'Responded', ),
        self::TYPE_CAMELNAME     => array('id', 'customerId', 'questionId', 'answer', 'response', 'mediaId', 'responded', ),
        self::TYPE_COLNAME       => array(AnsweredQuestionsTableMap::COL_ID, AnsweredQuestionsTableMap::COL_CUSTOMER_ID, AnsweredQuestionsTableMap::COL_QUESTION_ID, AnsweredQuestionsTableMap::COL_ANSWER, AnsweredQuestionsTableMap::COL_RESPONSE, AnsweredQuestionsTableMap::COL_MEDIA_ID, AnsweredQuestionsTableMap::COL_RESPONDED, ),
        self::TYPE_FIELDNAME     => array('id', 'Customer_id', 'Question_id', 'Answer', 'response', 'media_id', 'responded', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CustomerId' => 1, 'QuestionId' => 2, 'Answer' => 3, 'Response' => 4, 'MediaId' => 5, 'Responded' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'customerId' => 1, 'questionId' => 2, 'answer' => 3, 'response' => 4, 'mediaId' => 5, 'responded' => 6, ),
        self::TYPE_COLNAME       => array(AnsweredQuestionsTableMap::COL_ID => 0, AnsweredQuestionsTableMap::COL_CUSTOMER_ID => 1, AnsweredQuestionsTableMap::COL_QUESTION_ID => 2, AnsweredQuestionsTableMap::COL_ANSWER => 3, AnsweredQuestionsTableMap::COL_RESPONSE => 4, AnsweredQuestionsTableMap::COL_MEDIA_ID => 5, AnsweredQuestionsTableMap::COL_RESPONDED => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Customer_id' => 1, 'Question_id' => 2, 'Answer' => 3, 'response' => 4, 'media_id' => 5, 'responded' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('answered_questions');
        $this->setPhpName('AnsweredQuestions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AnsweredQuestions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignPrimaryKey('Customer_id', 'CustomerId', 'INTEGER' , 'customer', 'customer_id', true, null, null);
        $this->addForeignPrimaryKey('Question_id', 'QuestionId', 'INTEGER' , 'questions', 'question_id', true, null, null);
        $this->addColumn('Answer', 'Answer', 'LONGVARCHAR', false, null, null);
        $this->addColumn('response', 'Response', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('media_id', 'MediaId', 'INTEGER', 'media', 'Media_id', false, null, null);
        $this->addColumn('responded', 'Responded', 'BOOLEAN', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', '\\Customer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Customer_id',
    1 => ':customer_id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Questions', '\\Questions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Question_id',
    1 => ':question_id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Media', '\\Media', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':media_id',
    1 => ':Media_id',
  ),
), 'CASCADE', null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \AnsweredQuestions $obj A \AnsweredQuestions object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getId() || is_scalar($obj->getId()) || is_callable([$obj->getId(), '__toString']) ? (string) $obj->getId() : $obj->getId()), (null === $obj->getCustomerId() || is_scalar($obj->getCustomerId()) || is_callable([$obj->getCustomerId(), '__toString']) ? (string) $obj->getCustomerId() : $obj->getCustomerId()), (null === $obj->getQuestionId() || is_scalar($obj->getQuestionId()) || is_callable([$obj->getQuestionId(), '__toString']) ? (string) $obj->getQuestionId() : $obj->getQuestionId())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \AnsweredQuestions object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \AnsweredQuestions) {
                $key = serialize([(null === $value->getId() || is_scalar($value->getId()) || is_callable([$value->getId(), '__toString']) ? (string) $value->getId() : $value->getId()), (null === $value->getCustomerId() || is_scalar($value->getCustomerId()) || is_callable([$value->getCustomerId(), '__toString']) ? (string) $value->getCustomerId() : $value->getCustomerId()), (null === $value->getQuestionId() || is_scalar($value->getQuestionId()) || is_callable([$value->getQuestionId(), '__toString']) ? (string) $value->getQuestionId() : $value->getQuestionId())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \AnsweredQuestions object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AnsweredQuestionsTableMap::CLASS_DEFAULT : AnsweredQuestionsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (AnsweredQuestions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnsweredQuestionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnsweredQuestionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnsweredQuestionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnsweredQuestionsTableMap::OM_CLASS;
            /** @var AnsweredQuestions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnsweredQuestionsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AnsweredQuestionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnsweredQuestionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnsweredQuestions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnsweredQuestionsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_ID);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_QUESTION_ID);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_ANSWER);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_RESPONSE);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_MEDIA_ID);
            $criteria->addSelectColumn(AnsweredQuestionsTableMap::COL_RESPONDED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Customer_id');
            $criteria->addSelectColumn($alias . '.Question_id');
            $criteria->addSelectColumn($alias . '.Answer');
            $criteria->addSelectColumn($alias . '.response');
            $criteria->addSelectColumn($alias . '.media_id');
            $criteria->addSelectColumn($alias . '.responded');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AnsweredQuestionsTableMap::DATABASE_NAME)->getTable(AnsweredQuestionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnsweredQuestionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnsweredQuestionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnsweredQuestionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnsweredQuestions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnsweredQuestions object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnsweredQuestionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnsweredQuestions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnsweredQuestionsTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AnsweredQuestionsTableMap::COL_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(AnsweredQuestionsTableMap::COL_QUESTION_ID, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = AnsweredQuestionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnsweredQuestionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnsweredQuestionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the answered_questions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnsweredQuestionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnsweredQuestions or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnsweredQuestions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnsweredQuestionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnsweredQuestions object
        }

        if ($criteria->containsKey(AnsweredQuestionsTableMap::COL_ID) && $criteria->keyContainsValue(AnsweredQuestionsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnsweredQuestionsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnsweredQuestionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnsweredQuestionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnsweredQuestionsTableMap::buildTableMap();
