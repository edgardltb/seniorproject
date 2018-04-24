<?php

namespace Base;

use \Administrator as ChildAdministrator;
use \AdministratorQuery as ChildAdministratorQuery;
use \Exception;
use \PDO;
use Map\AdministratorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'administrator' table.
 *
 *
 *
 * @method     ChildAdministratorQuery orderByAdminId($order = Criteria::ASC) Order by the admin_id column
 * @method     ChildAdministratorQuery orderByUserInfoId($order = Criteria::ASC) Order by the user_info_id column
 *
 * @method     ChildAdministratorQuery groupByAdminId() Group by the admin_id column
 * @method     ChildAdministratorQuery groupByUserInfoId() Group by the user_info_id column
 *
 * @method     ChildAdministratorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdministratorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdministratorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdministratorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdministratorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdministratorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdministratorQuery leftJoinUserInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInfo relation
 * @method     ChildAdministratorQuery rightJoinUserInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInfo relation
 * @method     ChildAdministratorQuery innerJoinUserInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInfo relation
 *
 * @method     ChildAdministratorQuery joinWithUserInfo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserInfo relation
 *
 * @method     ChildAdministratorQuery leftJoinWithUserInfo() Adds a LEFT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildAdministratorQuery rightJoinWithUserInfo() Adds a RIGHT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildAdministratorQuery innerJoinWithUserInfo() Adds a INNER JOIN clause and with to the query using the UserInfo relation
 *
 * @method     \UserInfoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAdministrator findOne(ConnectionInterface $con = null) Return the first ChildAdministrator matching the query
 * @method     ChildAdministrator findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAdministrator matching the query, or a new ChildAdministrator object populated from the query conditions when no match is found
 *
 * @method     ChildAdministrator findOneByAdminId(int $admin_id) Return the first ChildAdministrator filtered by the admin_id column
 * @method     ChildAdministrator findOneByUserInfoId(int $user_info_id) Return the first ChildAdministrator filtered by the user_info_id column *

 * @method     ChildAdministrator requirePk($key, ConnectionInterface $con = null) Return the ChildAdministrator by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrator requireOne(ConnectionInterface $con = null) Return the first ChildAdministrator matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrator requireOneByAdminId(int $admin_id) Return the first ChildAdministrator filtered by the admin_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrator requireOneByUserInfoId(int $user_info_id) Return the first ChildAdministrator filtered by the user_info_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrator[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAdministrator objects based on current ModelCriteria
 * @method     ChildAdministrator[]|ObjectCollection findByAdminId(int $admin_id) Return ChildAdministrator objects filtered by the admin_id column
 * @method     ChildAdministrator[]|ObjectCollection findByUserInfoId(int $user_info_id) Return ChildAdministrator objects filtered by the user_info_id column
 * @method     ChildAdministrator[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdministratorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AdministratorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Administrator', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdministratorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdministratorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdministratorQuery) {
            return $criteria;
        }
        $query = new ChildAdministratorQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAdministrator|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdministratorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdministratorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAdministrator A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT admin_id, user_info_id FROM administrator WHERE admin_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAdministrator $obj */
            $obj = new ChildAdministrator();
            $obj->hydrate($row);
            AdministratorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAdministrator|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the admin_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAdminId(1234); // WHERE admin_id = 1234
     * $query->filterByAdminId(array(12, 34)); // WHERE admin_id IN (12, 34)
     * $query->filterByAdminId(array('min' => 12)); // WHERE admin_id > 12
     * </code>
     *
     * @param     mixed $adminId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function filterByAdminId($adminId = null, $comparison = null)
    {
        if (is_array($adminId)) {
            $useMinMax = false;
            if (isset($adminId['min'])) {
                $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $adminId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adminId['max'])) {
                $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $adminId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $adminId, $comparison);
    }

    /**
     * Filter the query on the user_info_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserInfoId(1234); // WHERE user_info_id = 1234
     * $query->filterByUserInfoId(array(12, 34)); // WHERE user_info_id IN (12, 34)
     * $query->filterByUserInfoId(array('min' => 12)); // WHERE user_info_id > 12
     * </code>
     *
     * @see       filterByUserInfo()
     *
     * @param     mixed $userInfoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function filterByUserInfoId($userInfoId = null, $comparison = null)
    {
        if (is_array($userInfoId)) {
            $useMinMax = false;
            if (isset($userInfoId['min'])) {
                $this->addUsingAlias(AdministratorTableMap::COL_USER_INFO_ID, $userInfoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userInfoId['max'])) {
                $this->addUsingAlias(AdministratorTableMap::COL_USER_INFO_ID, $userInfoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministratorTableMap::COL_USER_INFO_ID, $userInfoId, $comparison);
    }

    /**
     * Filter the query by a related \UserInfo object
     *
     * @param \UserInfo|ObjectCollection $userInfo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAdministratorQuery The current query, for fluid interface
     */
    public function filterByUserInfo($userInfo, $comparison = null)
    {
        if ($userInfo instanceof \UserInfo) {
            return $this
                ->addUsingAlias(AdministratorTableMap::COL_USER_INFO_ID, $userInfo->getUserId(), $comparison);
        } elseif ($userInfo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdministratorTableMap::COL_USER_INFO_ID, $userInfo->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUserInfo() only accepts arguments of type \UserInfo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserInfo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function joinUserInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserInfo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserInfo');
        }

        return $this;
    }

    /**
     * Use the UserInfo relation UserInfo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserInfoQuery A secondary query class using the current class as primary query
     */
    public function useUserInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserInfo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserInfo', '\UserInfoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAdministrator $administrator Object to remove from the list of results
     *
     * @return $this|ChildAdministratorQuery The current query, for fluid interface
     */
    public function prune($administrator = null)
    {
        if ($administrator) {
            $this->addUsingAlias(AdministratorTableMap::COL_ADMIN_ID, $administrator->getAdminId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the administrator table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdministratorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdministratorTableMap::clearInstancePool();
            AdministratorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdministratorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdministratorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdministratorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdministratorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdministratorQuery
