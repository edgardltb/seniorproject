<?php

namespace Map;

use \Mentor;
use \MentorQuery;
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
 * This class defines the structure of the 'mentor' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MentorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MentorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'mentor';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Mentor';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Mentor';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the mentor_id field
     */
    const COL_MENTOR_ID = 'mentor.mentor_id';

    /**
     * the column name for the categorie field
     */
    const COL_CATEGORIE = 'mentor.categorie';

    /**
     * the column name for the info field
     */
    const COL_INFO = 'mentor.info';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'mentor.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'mentor.password';

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
        self::TYPE_PHPNAME       => array('MentorId', 'Categorie', 'Info', 'Username', 'Password', ),
        self::TYPE_CAMELNAME     => array('mentorId', 'categorie', 'info', 'username', 'password', ),
        self::TYPE_COLNAME       => array(MentorTableMap::COL_MENTOR_ID, MentorTableMap::COL_CATEGORIE, MentorTableMap::COL_INFO, MentorTableMap::COL_USERNAME, MentorTableMap::COL_PASSWORD, ),
        self::TYPE_FIELDNAME     => array('mentor_id', 'categorie', 'info', 'username', 'password', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MentorId' => 0, 'Categorie' => 1, 'Info' => 2, 'Username' => 3, 'Password' => 4, ),
        self::TYPE_CAMELNAME     => array('mentorId' => 0, 'categorie' => 1, 'info' => 2, 'username' => 3, 'password' => 4, ),
        self::TYPE_COLNAME       => array(MentorTableMap::COL_MENTOR_ID => 0, MentorTableMap::COL_CATEGORIE => 1, MentorTableMap::COL_INFO => 2, MentorTableMap::COL_USERNAME => 3, MentorTableMap::COL_PASSWORD => 4, ),
        self::TYPE_FIELDNAME     => array('mentor_id' => 0, 'categorie' => 1, 'info' => 2, 'username' => 3, 'password' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('mentor');
        $this->setPhpName('Mentor');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Mentor');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('mentor_id', 'MentorId', 'INTEGER', true, null, null);
        $this->addForeignKey('categorie', 'Categorie', 'INTEGER', 'category', 'categorie_id', false, null, null);
        $this->addForeignKey('info', 'Info', 'INTEGER', 'user_info', 'user_id', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 45, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 45, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', '\\Category', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':categorie',
    1 => ':categorie_id',
  ),
), 'SET NULL', null, null, false);
        $this->addRelation('UserInfo', '\\UserInfo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':info',
    1 => ':user_id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Customer', '\\Customer', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':men',
    1 => ':mentor_id',
  ),
), 'SET NULL', null, 'Customers', false);
        $this->addRelation('Schedule', '\\Schedule', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Mentor_id',
    1 => ':mentor_id',
  ),
), 'CASCADE', null, 'Schedules', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to mentor     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CustomerTableMap::clearInstancePool();
        ScheduleTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? MentorTableMap::CLASS_DEFAULT : MentorTableMap::OM_CLASS;
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
     * @return array           (Mentor object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MentorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MentorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MentorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MentorTableMap::OM_CLASS;
            /** @var Mentor $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MentorTableMap::addInstanceToPool($obj, $key);
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
            $key = MentorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MentorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Mentor $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MentorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MentorTableMap::COL_MENTOR_ID);
            $criteria->addSelectColumn(MentorTableMap::COL_CATEGORIE);
            $criteria->addSelectColumn(MentorTableMap::COL_INFO);
            $criteria->addSelectColumn(MentorTableMap::COL_USERNAME);
            $criteria->addSelectColumn(MentorTableMap::COL_PASSWORD);
        } else {
            $criteria->addSelectColumn($alias . '.mentor_id');
            $criteria->addSelectColumn($alias . '.categorie');
            $criteria->addSelectColumn($alias . '.info');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
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
        return Propel::getServiceContainer()->getDatabaseMap(MentorTableMap::DATABASE_NAME)->getTable(MentorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MentorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MentorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MentorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Mentor or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Mentor object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Mentor) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MentorTableMap::DATABASE_NAME);
            $criteria->add(MentorTableMap::COL_MENTOR_ID, (array) $values, Criteria::IN);
        }

        $query = MentorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MentorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MentorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the mentor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MentorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Mentor or Criteria object.
     *
     * @param mixed               $criteria Criteria or Mentor object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Mentor object
        }

        if ($criteria->containsKey(MentorTableMap::COL_MENTOR_ID) && $criteria->keyContainsValue(MentorTableMap::COL_MENTOR_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MentorTableMap::COL_MENTOR_ID.')');
        }


        // Set the correct dbName
        $query = MentorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MentorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MentorTableMap::buildTableMap();
