<?php

namespace Base;

use \UserInfo as ChildUserInfo;
use \UserInfoQuery as ChildUserInfoQuery;
use \Exception;
use \PDO;
use Map\UserInfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user_info' table.
 *
 *
 *
 * @method     ChildUserInfoQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildUserInfoQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildUserInfoQuery orderByPhonenum($order = Criteria::ASC) Order by the phonenum column
 * @method     ChildUserInfoQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildUserInfoQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildUserInfoQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildUserInfoQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     ChildUserInfoQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildUserInfoQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildUserInfoQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildUserInfoQuery orderByPassword($order = Criteria::ASC) Order by the password column
 *
 * @method     ChildUserInfoQuery groupByFirstName() Group by the first_name column
 * @method     ChildUserInfoQuery groupByLastName() Group by the last_name column
 * @method     ChildUserInfoQuery groupByPhonenum() Group by the phonenum column
 * @method     ChildUserInfoQuery groupByAddress() Group by the address column
 * @method     ChildUserInfoQuery groupByState() Group by the state column
 * @method     ChildUserInfoQuery groupByCity() Group by the city column
 * @method     ChildUserInfoQuery groupByZipcode() Group by the zipcode column
 * @method     ChildUserInfoQuery groupByUserId() Group by the user_id column
 * @method     ChildUserInfoQuery groupByEmail() Group by the email column
 * @method     ChildUserInfoQuery groupByUsername() Group by the username column
 * @method     ChildUserInfoQuery groupByPassword() Group by the password column
 *
 * @method     ChildUserInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserInfoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserInfoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserInfoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserInfoQuery leftJoinAdministrator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Administrator relation
 * @method     ChildUserInfoQuery rightJoinAdministrator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Administrator relation
 * @method     ChildUserInfoQuery innerJoinAdministrator($relationAlias = null) Adds a INNER JOIN clause to the query using the Administrator relation
 *
 * @method     ChildUserInfoQuery joinWithAdministrator($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Administrator relation
 *
 * @method     ChildUserInfoQuery leftJoinWithAdministrator() Adds a LEFT JOIN clause and with to the query using the Administrator relation
 * @method     ChildUserInfoQuery rightJoinWithAdministrator() Adds a RIGHT JOIN clause and with to the query using the Administrator relation
 * @method     ChildUserInfoQuery innerJoinWithAdministrator() Adds a INNER JOIN clause and with to the query using the Administrator relation
 *
 * @method     ChildUserInfoQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildUserInfoQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildUserInfoQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildUserInfoQuery joinWithCustomer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customer relation
 *
 * @method     ChildUserInfoQuery leftJoinWithCustomer() Adds a LEFT JOIN clause and with to the query using the Customer relation
 * @method     ChildUserInfoQuery rightJoinWithCustomer() Adds a RIGHT JOIN clause and with to the query using the Customer relation
 * @method     ChildUserInfoQuery innerJoinWithCustomer() Adds a INNER JOIN clause and with to the query using the Customer relation
 *
 * @method     ChildUserInfoQuery leftJoinMentor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mentor relation
 * @method     ChildUserInfoQuery rightJoinMentor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mentor relation
 * @method     ChildUserInfoQuery innerJoinMentor($relationAlias = null) Adds a INNER JOIN clause to the query using the Mentor relation
 *
 * @method     ChildUserInfoQuery joinWithMentor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Mentor relation
 *
 * @method     ChildUserInfoQuery leftJoinWithMentor() Adds a LEFT JOIN clause and with to the query using the Mentor relation
 * @method     ChildUserInfoQuery rightJoinWithMentor() Adds a RIGHT JOIN clause and with to the query using the Mentor relation
 * @method     ChildUserInfoQuery innerJoinWithMentor() Adds a INNER JOIN clause and with to the query using the Mentor relation
 *
 * @method     \AdministratorQuery|\CustomerQuery|\MentorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUserInfo findOne(ConnectionInterface $con = null) Return the first ChildUserInfo matching the query
 * @method     ChildUserInfo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUserInfo matching the query, or a new ChildUserInfo object populated from the query conditions when no match is found
 *
 * @method     ChildUserInfo findOneByFirstName(string $first_name) Return the first ChildUserInfo filtered by the first_name column
 * @method     ChildUserInfo findOneByLastName(string $last_name) Return the first ChildUserInfo filtered by the last_name column
 * @method     ChildUserInfo findOneByPhonenum(string $phonenum) Return the first ChildUserInfo filtered by the phonenum column
 * @method     ChildUserInfo findOneByAddress(string $address) Return the first ChildUserInfo filtered by the address column
 * @method     ChildUserInfo findOneByState(string $state) Return the first ChildUserInfo filtered by the state column
 * @method     ChildUserInfo findOneByCity(string $city) Return the first ChildUserInfo filtered by the city column
 * @method     ChildUserInfo findOneByZipcode(string $zipcode) Return the first ChildUserInfo filtered by the zipcode column
 * @method     ChildUserInfo findOneByUserId(int $user_id) Return the first ChildUserInfo filtered by the user_id column
 * @method     ChildUserInfo findOneByEmail(string $email) Return the first ChildUserInfo filtered by the email column
 * @method     ChildUserInfo findOneByUsername(string $username) Return the first ChildUserInfo filtered by the username column
 * @method     ChildUserInfo findOneByPassword(string $password) Return the first ChildUserInfo filtered by the password column *

 * @method     ChildUserInfo requirePk($key, ConnectionInterface $con = null) Return the ChildUserInfo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOne(ConnectionInterface $con = null) Return the first ChildUserInfo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserInfo requireOneByFirstName(string $first_name) Return the first ChildUserInfo filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByLastName(string $last_name) Return the first ChildUserInfo filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByPhonenum(string $phonenum) Return the first ChildUserInfo filtered by the phonenum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByAddress(string $address) Return the first ChildUserInfo filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByState(string $state) Return the first ChildUserInfo filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByCity(string $city) Return the first ChildUserInfo filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByZipcode(string $zipcode) Return the first ChildUserInfo filtered by the zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByUserId(int $user_id) Return the first ChildUserInfo filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByEmail(string $email) Return the first ChildUserInfo filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByUsername(string $username) Return the first ChildUserInfo filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserInfo requireOneByPassword(string $password) Return the first ChildUserInfo filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserInfo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUserInfo objects based on current ModelCriteria
 * @method     ChildUserInfo[]|ObjectCollection findByFirstName(string $first_name) Return ChildUserInfo objects filtered by the first_name column
 * @method     ChildUserInfo[]|ObjectCollection findByLastName(string $last_name) Return ChildUserInfo objects filtered by the last_name column
 * @method     ChildUserInfo[]|ObjectCollection findByPhonenum(string $phonenum) Return ChildUserInfo objects filtered by the phonenum column
 * @method     ChildUserInfo[]|ObjectCollection findByAddress(string $address) Return ChildUserInfo objects filtered by the address column
 * @method     ChildUserInfo[]|ObjectCollection findByState(string $state) Return ChildUserInfo objects filtered by the state column
 * @method     ChildUserInfo[]|ObjectCollection findByCity(string $city) Return ChildUserInfo objects filtered by the city column
 * @method     ChildUserInfo[]|ObjectCollection findByZipcode(string $zipcode) Return ChildUserInfo objects filtered by the zipcode column
 * @method     ChildUserInfo[]|ObjectCollection findByUserId(int $user_id) Return ChildUserInfo objects filtered by the user_id column
 * @method     ChildUserInfo[]|ObjectCollection findByEmail(string $email) Return ChildUserInfo objects filtered by the email column
 * @method     ChildUserInfo[]|ObjectCollection findByUsername(string $username) Return ChildUserInfo objects filtered by the username column
 * @method     ChildUserInfo[]|ObjectCollection findByPassword(string $password) Return ChildUserInfo objects filtered by the password column
 * @method     ChildUserInfo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserInfoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserInfoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\UserInfo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserInfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserInfoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserInfoQuery) {
            return $criteria;
        }
        $query = new ChildUserInfoQuery();
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
     * @return ChildUserInfo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserInfoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserInfoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUserInfo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT first_name, last_name, phonenum, address, state, city, zipcode, user_id, email, username, password FROM user_info WHERE user_id = :p0';
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
            /** @var ChildUserInfo $obj */
            $obj = new ChildUserInfo();
            $obj->hydrate($row);
            UserInfoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUserInfo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the phonenum column
     *
     * Example usage:
     * <code>
     * $query->filterByPhonenum('fooValue');   // WHERE phonenum = 'fooValue'
     * $query->filterByPhonenum('%fooValue%', Criteria::LIKE); // WHERE phonenum LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phonenum The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByPhonenum($phonenum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phonenum)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_PHONENUM, $phonenum, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%', Criteria::LIKE); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserInfoTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query by a related \Administrator object
     *
     * @param \Administrator|ObjectCollection $administrator the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByAdministrator($administrator, $comparison = null)
    {
        if ($administrator instanceof \Administrator) {
            return $this
                ->addUsingAlias(UserInfoTableMap::COL_USER_ID, $administrator->getUserInfoId(), $comparison);
        } elseif ($administrator instanceof ObjectCollection) {
            return $this
                ->useAdministratorQuery()
                ->filterByPrimaryKeys($administrator->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdministrator() only accepts arguments of type \Administrator or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Administrator relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function joinAdministrator($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Administrator');

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
            $this->addJoinObject($join, 'Administrator');
        }

        return $this;
    }

    /**
     * Use the Administrator relation Administrator object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AdministratorQuery A secondary query class using the current class as primary query
     */
    public function useAdministratorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdministrator($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Administrator', '\AdministratorQuery');
    }

    /**
     * Filter the query by a related \Customer object
     *
     * @param \Customer|ObjectCollection $customer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof \Customer) {
            return $this
                ->addUsingAlias(UserInfoTableMap::COL_USER_ID, $customer->getUserInfoId(), $comparison);
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
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', '\CustomerQuery');
    }

    /**
     * Filter the query by a related \Mentor object
     *
     * @param \Mentor|ObjectCollection $mentor the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserInfoQuery The current query, for fluid interface
     */
    public function filterByMentor($mentor, $comparison = null)
    {
        if ($mentor instanceof \Mentor) {
            return $this
                ->addUsingAlias(UserInfoTableMap::COL_USER_ID, $mentor->getInfo(), $comparison);
        } elseif ($mentor instanceof ObjectCollection) {
            return $this
                ->useMentorQuery()
                ->filterByPrimaryKeys($mentor->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function joinMentor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useMentorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMentor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mentor', '\MentorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUserInfo $userInfo Object to remove from the list of results
     *
     * @return $this|ChildUserInfoQuery The current query, for fluid interface
     */
    public function prune($userInfo = null)
    {
        if ($userInfo) {
            $this->addUsingAlias(UserInfoTableMap::COL_USER_ID, $userInfo->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserInfoTableMap::clearInstancePool();
            UserInfoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserInfoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserInfoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserInfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserInfoQuery
