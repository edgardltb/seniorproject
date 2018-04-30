<?php

namespace Map;

use \UserInfo;
use \UserInfoQuery;
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
 * This class defines the structure of the 'user_info' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserInfoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UserInfoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user_info';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\UserInfo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'UserInfo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'user_info.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'user_info.last_name';

    /**
     * the column name for the phonenum field
     */
    const COL_PHONENUM = 'user_info.phonenum';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'user_info.address';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'user_info.state';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'user_info.city';

    /**
     * the column name for the zipcode field
     */
    const COL_ZIPCODE = 'user_info.zipcode';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'user_info.user_id';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'user_info.email';

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
        self::TYPE_PHPNAME       => array('FirstName', 'LastName', 'Phonenum', 'Address', 'State', 'City', 'Zipcode', 'UserId', 'Email', ),
        self::TYPE_CAMELNAME     => array('firstName', 'lastName', 'phonenum', 'address', 'state', 'city', 'zipcode', 'userId', 'email', ),
        self::TYPE_COLNAME       => array(UserInfoTableMap::COL_FIRST_NAME, UserInfoTableMap::COL_LAST_NAME, UserInfoTableMap::COL_PHONENUM, UserInfoTableMap::COL_ADDRESS, UserInfoTableMap::COL_STATE, UserInfoTableMap::COL_CITY, UserInfoTableMap::COL_ZIPCODE, UserInfoTableMap::COL_USER_ID, UserInfoTableMap::COL_EMAIL, ),
        self::TYPE_FIELDNAME     => array('first_name', 'last_name', 'phonenum', 'address', 'state', 'city', 'zipcode', 'user_id', 'email', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FirstName' => 0, 'LastName' => 1, 'Phonenum' => 2, 'Address' => 3, 'State' => 4, 'City' => 5, 'Zipcode' => 6, 'UserId' => 7, 'Email' => 8, ),
        self::TYPE_CAMELNAME     => array('firstName' => 0, 'lastName' => 1, 'phonenum' => 2, 'address' => 3, 'state' => 4, 'city' => 5, 'zipcode' => 6, 'userId' => 7, 'email' => 8, ),
        self::TYPE_COLNAME       => array(UserInfoTableMap::COL_FIRST_NAME => 0, UserInfoTableMap::COL_LAST_NAME => 1, UserInfoTableMap::COL_PHONENUM => 2, UserInfoTableMap::COL_ADDRESS => 3, UserInfoTableMap::COL_STATE => 4, UserInfoTableMap::COL_CITY => 5, UserInfoTableMap::COL_ZIPCODE => 6, UserInfoTableMap::COL_USER_ID => 7, UserInfoTableMap::COL_EMAIL => 8, ),
        self::TYPE_FIELDNAME     => array('first_name' => 0, 'last_name' => 1, 'phonenum' => 2, 'address' => 3, 'state' => 4, 'city' => 5, 'zipcode' => 6, 'user_id' => 7, 'email' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('user_info');
        $this->setPhpName('UserInfo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\UserInfo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 45, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 45, null);
        $this->addColumn('phonenum', 'Phonenum', 'VARCHAR', false, 45, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 45, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 45, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 45, null);
        $this->addColumn('zipcode', 'Zipcode', 'VARCHAR', false, 45, null);
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 45, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Administrator', '\\Administrator', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':info_id',
    1 => ':user_id',
  ),
), 'CASCADE', null, 'Administrators', false);
        $this->addRelation('Customer', '\\Customer', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':info_id',
    1 => ':user_id',
  ),
), 'CASCADE', null, 'Customers', false);
        $this->addRelation('Mentor', '\\Mentor', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':info',
    1 => ':user_id',
  ),
), 'CASCADE', null, 'Mentors', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to user_info     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AdministratorTableMap::clearInstancePool();
        CustomerTableMap::clearInstancePool();
        MentorTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 7 + $offset
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UserInfoTableMap::CLASS_DEFAULT : UserInfoTableMap::OM_CLASS;
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
     * @return array           (UserInfo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserInfoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserInfoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserInfoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserInfoTableMap::OM_CLASS;
            /** @var UserInfo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserInfoTableMap::addInstanceToPool($obj, $key);
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
            $key = UserInfoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserInfoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UserInfo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserInfoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UserInfoTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(UserInfoTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(UserInfoTableMap::COL_PHONENUM);
            $criteria->addSelectColumn(UserInfoTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(UserInfoTableMap::COL_STATE);
            $criteria->addSelectColumn(UserInfoTableMap::COL_CITY);
            $criteria->addSelectColumn(UserInfoTableMap::COL_ZIPCODE);
            $criteria->addSelectColumn(UserInfoTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UserInfoTableMap::COL_EMAIL);
        } else {
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.phonenum');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.zipcode');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.email');
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
        return Propel::getServiceContainer()->getDatabaseMap(UserInfoTableMap::DATABASE_NAME)->getTable(UserInfoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserInfoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserInfoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserInfoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UserInfo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UserInfo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \UserInfo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserInfoTableMap::DATABASE_NAME);
            $criteria->add(UserInfoTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = UserInfoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserInfoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserInfoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserInfoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UserInfo or Criteria object.
     *
     * @param mixed               $criteria Criteria or UserInfo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UserInfo object
        }

        if ($criteria->containsKey(UserInfoTableMap::COL_USER_ID) && $criteria->keyContainsValue(UserInfoTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserInfoTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = UserInfoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserInfoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserInfoTableMap::buildTableMap();
