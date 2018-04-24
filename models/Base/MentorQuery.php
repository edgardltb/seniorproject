<?php

namespace Base;

use \Mentor as ChildMentor;
use \MentorQuery as ChildMentorQuery;
use \Exception;
use \PDO;
use Map\MentorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mentor' table.
 *
 *
 *
 * @method     ChildMentorQuery orderByMentorId($order = Criteria::ASC) Order by the mentor_id column
 * @method     ChildMentorQuery orderByCategorie($order = Criteria::ASC) Order by the categorie column
 * @method     ChildMentorQuery orderByInfo($order = Criteria::ASC) Order by the info column
 *
 * @method     ChildMentorQuery groupByMentorId() Group by the mentor_id column
 * @method     ChildMentorQuery groupByCategorie() Group by the categorie column
 * @method     ChildMentorQuery groupByInfo() Group by the info column
 *
 * @method     ChildMentorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMentorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMentorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMentorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMentorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMentorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMentorQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ChildMentorQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ChildMentorQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ChildMentorQuery joinWithCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Category relation
 *
 * @method     ChildMentorQuery leftJoinWithCategory() Adds a LEFT JOIN clause and with to the query using the Category relation
 * @method     ChildMentorQuery rightJoinWithCategory() Adds a RIGHT JOIN clause and with to the query using the Category relation
 * @method     ChildMentorQuery innerJoinWithCategory() Adds a INNER JOIN clause and with to the query using the Category relation
 *
 * @method     ChildMentorQuery leftJoinUserInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInfo relation
 * @method     ChildMentorQuery rightJoinUserInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInfo relation
 * @method     ChildMentorQuery innerJoinUserInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInfo relation
 *
 * @method     ChildMentorQuery joinWithUserInfo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserInfo relation
 *
 * @method     ChildMentorQuery leftJoinWithUserInfo() Adds a LEFT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildMentorQuery rightJoinWithUserInfo() Adds a RIGHT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildMentorQuery innerJoinWithUserInfo() Adds a INNER JOIN clause and with to the query using the UserInfo relation
 *
 * @method     ChildMentorQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildMentorQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildMentorQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildMentorQuery joinWithCustomer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customer relation
 *
 * @method     ChildMentorQuery leftJoinWithCustomer() Adds a LEFT JOIN clause and with to the query using the Customer relation
 * @method     ChildMentorQuery rightJoinWithCustomer() Adds a RIGHT JOIN clause and with to the query using the Customer relation
 * @method     ChildMentorQuery innerJoinWithCustomer() Adds a INNER JOIN clause and with to the query using the Customer relation
 *
 * @method     ChildMentorQuery leftJoinSchedule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Schedule relation
 * @method     ChildMentorQuery rightJoinSchedule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Schedule relation
 * @method     ChildMentorQuery innerJoinSchedule($relationAlias = null) Adds a INNER JOIN clause to the query using the Schedule relation
 *
 * @method     ChildMentorQuery joinWithSchedule($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Schedule relation
 *
 * @method     ChildMentorQuery leftJoinWithSchedule() Adds a LEFT JOIN clause and with to the query using the Schedule relation
 * @method     ChildMentorQuery rightJoinWithSchedule() Adds a RIGHT JOIN clause and with to the query using the Schedule relation
 * @method     ChildMentorQuery innerJoinWithSchedule() Adds a INNER JOIN clause and with to the query using the Schedule relation
 *
 * @method     \CategoryQuery|\UserInfoQuery|\CustomerQuery|\ScheduleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMentor findOne(ConnectionInterface $con = null) Return the first ChildMentor matching the query
 * @method     ChildMentor findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMentor matching the query, or a new ChildMentor object populated from the query conditions when no match is found
 *
 * @method     ChildMentor findOneByMentorId(int $mentor_id) Return the first ChildMentor filtered by the mentor_id column
 * @method     ChildMentor findOneByCategorie(int $categorie) Return the first ChildMentor filtered by the categorie column
 * @method     ChildMentor findOneByInfo(int $info) Return the first ChildMentor filtered by the info column *

 * @method     ChildMentor requirePk($key, ConnectionInterface $con = null) Return the ChildMentor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMentor requireOne(ConnectionInterface $con = null) Return the first ChildMentor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMentor requireOneByMentorId(int $mentor_id) Return the first ChildMentor filtered by the mentor_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMentor requireOneByCategorie(int $categorie) Return the first ChildMentor filtered by the categorie column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMentor requireOneByInfo(int $info) Return the first ChildMentor filtered by the info column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMentor[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMentor objects based on current ModelCriteria
 * @method     ChildMentor[]|ObjectCollection findByMentorId(int $mentor_id) Return ChildMentor objects filtered by the mentor_id column
 * @method     ChildMentor[]|ObjectCollection findByCategorie(int $categorie) Return ChildMentor objects filtered by the categorie column
 * @method     ChildMentor[]|ObjectCollection findByInfo(int $info) Return ChildMentor objects filtered by the info column
 * @method     ChildMentor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MentorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MentorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Mentor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMentorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMentorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMentorQuery) {
            return $criteria;
        }
        $query = new ChildMentorQuery();
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
     * @return ChildMentor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MentorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MentorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMentor A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT mentor_id, categorie, info FROM mentor WHERE mentor_id = :p0';
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
            /** @var ChildMentor $obj */
            $obj = new ChildMentor();
            $obj->hydrate($row);
            MentorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMentor|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the mentor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMentorId(1234); // WHERE mentor_id = 1234
     * $query->filterByMentorId(array(12, 34)); // WHERE mentor_id IN (12, 34)
     * $query->filterByMentorId(array('min' => 12)); // WHERE mentor_id > 12
     * </code>
     *
     * @param     mixed $mentorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function filterByMentorId($mentorId = null, $comparison = null)
    {
        if (is_array($mentorId)) {
            $useMinMax = false;
            if (isset($mentorId['min'])) {
                $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $mentorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mentorId['max'])) {
                $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $mentorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $mentorId, $comparison);
    }

    /**
     * Filter the query on the categorie column
     *
     * Example usage:
     * <code>
     * $query->filterByCategorie(1234); // WHERE categorie = 1234
     * $query->filterByCategorie(array(12, 34)); // WHERE categorie IN (12, 34)
     * $query->filterByCategorie(array('min' => 12)); // WHERE categorie > 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $categorie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function filterByCategorie($categorie = null, $comparison = null)
    {
        if (is_array($categorie)) {
            $useMinMax = false;
            if (isset($categorie['min'])) {
                $this->addUsingAlias(MentorTableMap::COL_CATEGORIE, $categorie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categorie['max'])) {
                $this->addUsingAlias(MentorTableMap::COL_CATEGORIE, $categorie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MentorTableMap::COL_CATEGORIE, $categorie, $comparison);
    }

    /**
     * Filter the query on the info column
     *
     * Example usage:
     * <code>
     * $query->filterByInfo(1234); // WHERE info = 1234
     * $query->filterByInfo(array(12, 34)); // WHERE info IN (12, 34)
     * $query->filterByInfo(array('min' => 12)); // WHERE info > 12
     * </code>
     *
     * @see       filterByUserInfo()
     *
     * @param     mixed $info The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function filterByInfo($info = null, $comparison = null)
    {
        if (is_array($info)) {
            $useMinMax = false;
            if (isset($info['min'])) {
                $this->addUsingAlias(MentorTableMap::COL_INFO, $info['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($info['max'])) {
                $this->addUsingAlias(MentorTableMap::COL_INFO, $info['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MentorTableMap::COL_INFO, $info, $comparison);
    }

    /**
     * Filter the query by a related \Category object
     *
     * @param \Category|ObjectCollection $category The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMentorQuery The current query, for fluid interface
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof \Category) {
            return $this
                ->addUsingAlias(MentorTableMap::COL_CATEGORIE, $category->getCategorieId(), $comparison);
        } elseif ($category instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MentorTableMap::COL_CATEGORIE, $category->toKeyValue('PrimaryKey', 'CategorieId'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type \Category or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation Category object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', '\CategoryQuery');
    }

    /**
     * Filter the query by a related \UserInfo object
     *
     * @param \UserInfo|ObjectCollection $userInfo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMentorQuery The current query, for fluid interface
     */
    public function filterByUserInfo($userInfo, $comparison = null)
    {
        if ($userInfo instanceof \UserInfo) {
            return $this
                ->addUsingAlias(MentorTableMap::COL_INFO, $userInfo->getUserId(), $comparison);
        } elseif ($userInfo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MentorTableMap::COL_INFO, $userInfo->toKeyValue('PrimaryKey', 'UserId'), $comparison);
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
     * @return $this|ChildMentorQuery The current query, for fluid interface
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
     * Filter the query by a related \Customer object
     *
     * @param \Customer|ObjectCollection $customer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMentorQuery The current query, for fluid interface
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof \Customer) {
            return $this
                ->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $customer->getMen(), $comparison);
        } elseif ($customer instanceof ObjectCollection) {
            return $this
                ->useCustomerQuery()
                ->filterByPrimaryKeys($customer->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type \Customer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

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
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation Customer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', '\CustomerQuery');
    }

    /**
     * Filter the query by a related \Schedule object
     *
     * @param \Schedule|ObjectCollection $schedule the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMentorQuery The current query, for fluid interface
     */
    public function filterBySchedule($schedule, $comparison = null)
    {
        if ($schedule instanceof \Schedule) {
            return $this
                ->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $schedule->getMentorId(), $comparison);
        } elseif ($schedule instanceof ObjectCollection) {
            return $this
                ->useScheduleQuery()
                ->filterByPrimaryKeys($schedule->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySchedule() only accepts arguments of type \Schedule or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Schedule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function joinSchedule($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Schedule');

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
            $this->addJoinObject($join, 'Schedule');
        }

        return $this;
    }

    /**
     * Use the Schedule relation Schedule object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ScheduleQuery A secondary query class using the current class as primary query
     */
    public function useScheduleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchedule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Schedule', '\ScheduleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMentor $mentor Object to remove from the list of results
     *
     * @return $this|ChildMentorQuery The current query, for fluid interface
     */
    public function prune($mentor = null)
    {
        if ($mentor) {
            $this->addUsingAlias(MentorTableMap::COL_MENTOR_ID, $mentor->getMentorId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mentor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MentorTableMap::clearInstancePool();
            MentorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MentorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MentorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MentorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MentorQuery
