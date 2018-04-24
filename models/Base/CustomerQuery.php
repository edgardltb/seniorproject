<?php

namespace Base;

use \Customer as ChildCustomer;
use \CustomerQuery as ChildCustomerQuery;
use \Exception;
use \PDO;
use Map\CustomerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'customer' table.
 *
 *
 *
 * @method     ChildCustomerQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildCustomerQuery orderByMen($order = Criteria::ASC) Order by the men column
 * @method     ChildCustomerQuery orderByCat($order = Criteria::ASC) Order by the cat column
 * @method     ChildCustomerQuery orderByUserInfoId($order = Criteria::ASC) Order by the user_info_id column
 *
 * @method     ChildCustomerQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildCustomerQuery groupByMen() Group by the men column
 * @method     ChildCustomerQuery groupByCat() Group by the cat column
 * @method     ChildCustomerQuery groupByUserInfoId() Group by the user_info_id column
 *
 * @method     ChildCustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustomerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustomerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustomerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustomerQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ChildCustomerQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ChildCustomerQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ChildCustomerQuery joinWithCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Category relation
 *
 * @method     ChildCustomerQuery leftJoinWithCategory() Adds a LEFT JOIN clause and with to the query using the Category relation
 * @method     ChildCustomerQuery rightJoinWithCategory() Adds a RIGHT JOIN clause and with to the query using the Category relation
 * @method     ChildCustomerQuery innerJoinWithCategory() Adds a INNER JOIN clause and with to the query using the Category relation
 *
 * @method     ChildCustomerQuery leftJoinMentor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mentor relation
 * @method     ChildCustomerQuery rightJoinMentor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mentor relation
 * @method     ChildCustomerQuery innerJoinMentor($relationAlias = null) Adds a INNER JOIN clause to the query using the Mentor relation
 *
 * @method     ChildCustomerQuery joinWithMentor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Mentor relation
 *
 * @method     ChildCustomerQuery leftJoinWithMentor() Adds a LEFT JOIN clause and with to the query using the Mentor relation
 * @method     ChildCustomerQuery rightJoinWithMentor() Adds a RIGHT JOIN clause and with to the query using the Mentor relation
 * @method     ChildCustomerQuery innerJoinWithMentor() Adds a INNER JOIN clause and with to the query using the Mentor relation
 *
 * @method     ChildCustomerQuery leftJoinUserInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInfo relation
 * @method     ChildCustomerQuery rightJoinUserInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInfo relation
 * @method     ChildCustomerQuery innerJoinUserInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInfo relation
 *
 * @method     ChildCustomerQuery joinWithUserInfo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserInfo relation
 *
 * @method     ChildCustomerQuery leftJoinWithUserInfo() Adds a LEFT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildCustomerQuery rightJoinWithUserInfo() Adds a RIGHT JOIN clause and with to the query using the UserInfo relation
 * @method     ChildCustomerQuery innerJoinWithUserInfo() Adds a INNER JOIN clause and with to the query using the UserInfo relation
 *
 * @method     ChildCustomerQuery leftJoinCustomerHasQuestions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerHasQuestions relation
 * @method     ChildCustomerQuery rightJoinCustomerHasQuestions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerHasQuestions relation
 * @method     ChildCustomerQuery innerJoinCustomerHasQuestions($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerHasQuestions relation
 *
 * @method     ChildCustomerQuery joinWithCustomerHasQuestions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CustomerHasQuestions relation
 *
 * @method     ChildCustomerQuery leftJoinWithCustomerHasQuestions() Adds a LEFT JOIN clause and with to the query using the CustomerHasQuestions relation
 * @method     ChildCustomerQuery rightJoinWithCustomerHasQuestions() Adds a RIGHT JOIN clause and with to the query using the CustomerHasQuestions relation
 * @method     ChildCustomerQuery innerJoinWithCustomerHasQuestions() Adds a INNER JOIN clause and with to the query using the CustomerHasQuestions relation
 *
 * @method     ChildCustomerQuery leftJoinSchedule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Schedule relation
 * @method     ChildCustomerQuery rightJoinSchedule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Schedule relation
 * @method     ChildCustomerQuery innerJoinSchedule($relationAlias = null) Adds a INNER JOIN clause to the query using the Schedule relation
 *
 * @method     ChildCustomerQuery joinWithSchedule($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Schedule relation
 *
 * @method     ChildCustomerQuery leftJoinWithSchedule() Adds a LEFT JOIN clause and with to the query using the Schedule relation
 * @method     ChildCustomerQuery rightJoinWithSchedule() Adds a RIGHT JOIN clause and with to the query using the Schedule relation
 * @method     ChildCustomerQuery innerJoinWithSchedule() Adds a INNER JOIN clause and with to the query using the Schedule relation
 *
 * @method     \CategoryQuery|\MentorQuery|\UserInfoQuery|\CustomerHasQuestionsQuery|\ScheduleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCustomer findOne(ConnectionInterface $con = null) Return the first ChildCustomer matching the query
 * @method     ChildCustomer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustomer matching the query, or a new ChildCustomer object populated from the query conditions when no match is found
 *
 * @method     ChildCustomer findOneByCustomerId(int $customer_id) Return the first ChildCustomer filtered by the customer_id column
 * @method     ChildCustomer findOneByMen(int $men) Return the first ChildCustomer filtered by the men column
 * @method     ChildCustomer findOneByCat(int $cat) Return the first ChildCustomer filtered by the cat column
 * @method     ChildCustomer findOneByUserInfoId(int $user_info_id) Return the first ChildCustomer filtered by the user_info_id column *

 * @method     ChildCustomer requirePk($key, ConnectionInterface $con = null) Return the ChildCustomer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOne(ConnectionInterface $con = null) Return the first ChildCustomer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomer requireOneByCustomerId(int $customer_id) Return the first ChildCustomer filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByMen(int $men) Return the first ChildCustomer filtered by the men column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCat(int $cat) Return the first ChildCustomer filtered by the cat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByUserInfoId(int $user_info_id) Return the first ChildCustomer filtered by the user_info_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCustomer objects based on current ModelCriteria
 * @method     ChildCustomer[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildCustomer objects filtered by the customer_id column
 * @method     ChildCustomer[]|ObjectCollection findByMen(int $men) Return ChildCustomer objects filtered by the men column
 * @method     ChildCustomer[]|ObjectCollection findByCat(int $cat) Return ChildCustomer objects filtered by the cat column
 * @method     ChildCustomer[]|ObjectCollection findByUserInfoId(int $user_info_id) Return ChildCustomer objects filtered by the user_info_id column
 * @method     ChildCustomer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CustomerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustomerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Customer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustomerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCustomerQuery) {
            return $criteria;
        }
        $query = new ChildCustomerQuery();
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
     * @return ChildCustomer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustomerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustomerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCustomer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_id, men, cat, user_info_id FROM customer WHERE customer_id = :p0';
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
            /** @var ChildCustomer $obj */
            $obj = new ChildCustomer();
            $obj->hydrate($row);
            CustomerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCustomer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the men column
     *
     * Example usage:
     * <code>
     * $query->filterByMen(1234); // WHERE men = 1234
     * $query->filterByMen(array(12, 34)); // WHERE men IN (12, 34)
     * $query->filterByMen(array('min' => 12)); // WHERE men > 12
     * </code>
     *
     * @see       filterByMentor()
     *
     * @param     mixed $men The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByMen($men = null, $comparison = null)
    {
        if (is_array($men)) {
            $useMinMax = false;
            if (isset($men['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_MEN, $men['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($men['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_MEN, $men['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_MEN, $men, $comparison);
    }

    /**
     * Filter the query on the cat column
     *
     * Example usage:
     * <code>
     * $query->filterByCat(1234); // WHERE cat = 1234
     * $query->filterByCat(array(12, 34)); // WHERE cat IN (12, 34)
     * $query->filterByCat(array('min' => 12)); // WHERE cat > 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $cat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCat($cat = null, $comparison = null)
    {
        if (is_array($cat)) {
            $useMinMax = false;
            if (isset($cat['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_CAT, $cat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cat['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_CAT, $cat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CAT, $cat, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByUserInfoId($userInfoId = null, $comparison = null)
    {
        if (is_array($userInfoId)) {
            $useMinMax = false;
            if (isset($userInfoId['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_USER_INFO_ID, $userInfoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userInfoId['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_USER_INFO_ID, $userInfoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_USER_INFO_ID, $userInfoId, $comparison);
    }

    /**
     * Filter the query by a related \Category object
     *
     * @param \Category|ObjectCollection $category The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof \Category) {
            return $this
                ->addUsingAlias(CustomerTableMap::COL_CAT, $category->getCategorieId(), $comparison);
        } elseif ($category instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerTableMap::COL_CAT, $category->toKeyValue('PrimaryKey', 'CategorieId'), $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', '\CategoryQuery');
    }

    /**
     * Filter the query by a related \Mentor object
     *
     * @param \Mentor|ObjectCollection $mentor The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByMentor($mentor, $comparison = null)
    {
        if ($mentor instanceof \Mentor) {
            return $this
                ->addUsingAlias(CustomerTableMap::COL_MEN, $mentor->getMentorId(), $comparison);
        } elseif ($mentor instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerTableMap::COL_MEN, $mentor->toKeyValue('PrimaryKey', 'MentorId'), $comparison);
        } else {
            throw new PropelException('filterByMentor() only accepts arguments of type \Mentor or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mentor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function joinMentor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mentor');

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
            $this->addJoinObject($join, 'Mentor');
        }

        return $this;
    }

    /**
     * Use the Mentor relation Mentor object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MentorQuery A secondary query class using the current class as primary query
     */
    public function useMentorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMentor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mentor', '\MentorQuery');
    }

    /**
     * Filter the query by a related \UserInfo object
     *
     * @param \UserInfo|ObjectCollection $userInfo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByUserInfo($userInfo, $comparison = null)
    {
        if ($userInfo instanceof \UserInfo) {
            return $this
                ->addUsingAlias(CustomerTableMap::COL_USER_INFO_ID, $userInfo->getUserId(), $comparison);
        } elseif ($userInfo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerTableMap::COL_USER_INFO_ID, $userInfo->toKeyValue('PrimaryKey', 'UserId'), $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
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
     * Filter the query by a related \CustomerHasQuestions object
     *
     * @param \CustomerHasQuestions|ObjectCollection $customerHasQuestions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerHasQuestions($customerHasQuestions, $comparison = null)
    {
        if ($customerHasQuestions instanceof \CustomerHasQuestions) {
            return $this
                ->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $customerHasQuestions->getCustomerId(), $comparison);
        } elseif ($customerHasQuestions instanceof ObjectCollection) {
            return $this
                ->useCustomerHasQuestionsQuery()
                ->filterByPrimaryKeys($customerHasQuestions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerHasQuestions() only accepts arguments of type \CustomerHasQuestions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerHasQuestions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function joinCustomerHasQuestions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerHasQuestions');

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
            $this->addJoinObject($join, 'CustomerHasQuestions');
        }

        return $this;
    }

    /**
     * Use the CustomerHasQuestions relation CustomerHasQuestions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CustomerHasQuestionsQuery A secondary query class using the current class as primary query
     */
    public function useCustomerHasQuestionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerHasQuestions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerHasQuestions', '\CustomerHasQuestionsQuery');
    }

    /**
     * Filter the query by a related \Schedule object
     *
     * @param \Schedule|ObjectCollection $schedule the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterBySchedule($schedule, $comparison = null)
    {
        if ($schedule instanceof \Schedule) {
            return $this
                ->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $schedule->getCustomerId(), $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
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
     * Filter the query by a related Questions object
     * using the customer_has_questions table as cross reference
     *
     * @param Questions $questions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByQuestions($questions, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useCustomerHasQuestionsQuery()
            ->filterByQuestions($questions, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustomer $customer Object to remove from the list of results
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function prune($customer = null)
    {
        if ($customer) {
            $this->addUsingAlias(CustomerTableMap::COL_CUSTOMER_ID, $customer->getCustomerId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustomerTableMap::clearInstancePool();
            CustomerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustomerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustomerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustomerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CustomerQuery
