<?php

namespace Base;

use \AnsweredQuestions as ChildAnsweredQuestions;
use \AnsweredQuestionsQuery as ChildAnsweredQuestionsQuery;
use \Exception;
use \PDO;
use Map\AnsweredQuestionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'answered_questions' table.
 *
 *
 *
 * @method     ChildAnsweredQuestionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAnsweredQuestionsQuery orderByCustomerId($order = Criteria::ASC) Order by the Customer_id column
 * @method     ChildAnsweredQuestionsQuery orderByQuestionId($order = Criteria::ASC) Order by the Question_id column
 * @method     ChildAnsweredQuestionsQuery orderByAnswer($order = Criteria::ASC) Order by the Answer column
 * @method     ChildAnsweredQuestionsQuery orderByResponse($order = Criteria::ASC) Order by the response column
 * @method     ChildAnsweredQuestionsQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 * @method     ChildAnsweredQuestionsQuery orderByResponded($order = Criteria::ASC) Order by the responded column
 *
 * @method     ChildAnsweredQuestionsQuery groupById() Group by the id column
 * @method     ChildAnsweredQuestionsQuery groupByCustomerId() Group by the Customer_id column
 * @method     ChildAnsweredQuestionsQuery groupByQuestionId() Group by the Question_id column
 * @method     ChildAnsweredQuestionsQuery groupByAnswer() Group by the Answer column
 * @method     ChildAnsweredQuestionsQuery groupByResponse() Group by the response column
 * @method     ChildAnsweredQuestionsQuery groupByMediaId() Group by the media_id column
 * @method     ChildAnsweredQuestionsQuery groupByResponded() Group by the responded column
 *
 * @method     ChildAnsweredQuestionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAnsweredQuestionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAnsweredQuestionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAnsweredQuestionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAnsweredQuestionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildAnsweredQuestionsQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildAnsweredQuestionsQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildAnsweredQuestionsQuery joinWithCustomer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customer relation
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinWithCustomer() Adds a LEFT JOIN clause and with to the query using the Customer relation
 * @method     ChildAnsweredQuestionsQuery rightJoinWithCustomer() Adds a RIGHT JOIN clause and with to the query using the Customer relation
 * @method     ChildAnsweredQuestionsQuery innerJoinWithCustomer() Adds a INNER JOIN clause and with to the query using the Customer relation
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinQuestions($relationAlias = null) Adds a LEFT JOIN clause to the query using the Questions relation
 * @method     ChildAnsweredQuestionsQuery rightJoinQuestions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Questions relation
 * @method     ChildAnsweredQuestionsQuery innerJoinQuestions($relationAlias = null) Adds a INNER JOIN clause to the query using the Questions relation
 *
 * @method     ChildAnsweredQuestionsQuery joinWithQuestions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Questions relation
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinWithQuestions() Adds a LEFT JOIN clause and with to the query using the Questions relation
 * @method     ChildAnsweredQuestionsQuery rightJoinWithQuestions() Adds a RIGHT JOIN clause and with to the query using the Questions relation
 * @method     ChildAnsweredQuestionsQuery innerJoinWithQuestions() Adds a INNER JOIN clause and with to the query using the Questions relation
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method     ChildAnsweredQuestionsQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method     ChildAnsweredQuestionsQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method     ChildAnsweredQuestionsQuery joinWithMedia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Media relation
 *
 * @method     ChildAnsweredQuestionsQuery leftJoinWithMedia() Adds a LEFT JOIN clause and with to the query using the Media relation
 * @method     ChildAnsweredQuestionsQuery rightJoinWithMedia() Adds a RIGHT JOIN clause and with to the query using the Media relation
 * @method     ChildAnsweredQuestionsQuery innerJoinWithMedia() Adds a INNER JOIN clause and with to the query using the Media relation
 *
 * @method     \CustomerQuery|\QuestionsQuery|\MediaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAnsweredQuestions findOne(ConnectionInterface $con = null) Return the first ChildAnsweredQuestions matching the query
 * @method     ChildAnsweredQuestions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAnsweredQuestions matching the query, or a new ChildAnsweredQuestions object populated from the query conditions when no match is found
 *
 * @method     ChildAnsweredQuestions findOneById(int $id) Return the first ChildAnsweredQuestions filtered by the id column
 * @method     ChildAnsweredQuestions findOneByCustomerId(int $Customer_id) Return the first ChildAnsweredQuestions filtered by the Customer_id column
 * @method     ChildAnsweredQuestions findOneByQuestionId(int $Question_id) Return the first ChildAnsweredQuestions filtered by the Question_id column
 * @method     ChildAnsweredQuestions findOneByAnswer(string $Answer) Return the first ChildAnsweredQuestions filtered by the Answer column
 * @method     ChildAnsweredQuestions findOneByResponse(string $response) Return the first ChildAnsweredQuestions filtered by the response column
 * @method     ChildAnsweredQuestions findOneByMediaId(int $media_id) Return the first ChildAnsweredQuestions filtered by the media_id column
 * @method     ChildAnsweredQuestions findOneByResponded(boolean $responded) Return the first ChildAnsweredQuestions filtered by the responded column *

 * @method     ChildAnsweredQuestions requirePk($key, ConnectionInterface $con = null) Return the ChildAnsweredQuestions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOne(ConnectionInterface $con = null) Return the first ChildAnsweredQuestions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnsweredQuestions requireOneById(int $id) Return the first ChildAnsweredQuestions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByCustomerId(int $Customer_id) Return the first ChildAnsweredQuestions filtered by the Customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByQuestionId(int $Question_id) Return the first ChildAnsweredQuestions filtered by the Question_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByAnswer(string $Answer) Return the first ChildAnsweredQuestions filtered by the Answer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByResponse(string $response) Return the first ChildAnsweredQuestions filtered by the response column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByMediaId(int $media_id) Return the first ChildAnsweredQuestions filtered by the media_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnsweredQuestions requireOneByResponded(boolean $responded) Return the first ChildAnsweredQuestions filtered by the responded column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnsweredQuestions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAnsweredQuestions objects based on current ModelCriteria
 * @method     ChildAnsweredQuestions[]|ObjectCollection findById(int $id) Return ChildAnsweredQuestions objects filtered by the id column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByCustomerId(int $Customer_id) Return ChildAnsweredQuestions objects filtered by the Customer_id column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByQuestionId(int $Question_id) Return ChildAnsweredQuestions objects filtered by the Question_id column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByAnswer(string $Answer) Return ChildAnsweredQuestions objects filtered by the Answer column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByResponse(string $response) Return ChildAnsweredQuestions objects filtered by the response column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByMediaId(int $media_id) Return ChildAnsweredQuestions objects filtered by the media_id column
 * @method     ChildAnsweredQuestions[]|ObjectCollection findByResponded(boolean $responded) Return ChildAnsweredQuestions objects filtered by the responded column
 * @method     ChildAnsweredQuestions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AnsweredQuestionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AnsweredQuestionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AnsweredQuestions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAnsweredQuestionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAnsweredQuestionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAnsweredQuestionsQuery) {
            return $criteria;
        }
        $query = new ChildAnsweredQuestionsQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$id, $Customer_id, $Question_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAnsweredQuestions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AnsweredQuestionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AnsweredQuestionsTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildAnsweredQuestions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Customer_id, Question_id, Answer, response, media_id, responded FROM answered_questions WHERE id = :p0 AND Customer_id = :p1 AND Question_id = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAnsweredQuestions $obj */
            $obj = new ChildAnsweredQuestions();
            $obj->hydrate($row);
            AnsweredQuestionsTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildAnsweredQuestions|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AnsweredQuestionsTableMap::COL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AnsweredQuestionsTableMap::COL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(AnsweredQuestionsTableMap::COL_QUESTION_ID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE Customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE Customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE Customer_id > 12
     * </code>
     *
     * @see       filterByCustomer()
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the Question_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestionId(1234); // WHERE Question_id = 1234
     * $query->filterByQuestionId(array(12, 34)); // WHERE Question_id IN (12, 34)
     * $query->filterByQuestionId(array('min' => 12)); // WHERE Question_id > 12
     * </code>
     *
     * @see       filterByQuestions()
     *
     * @param     mixed $questionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestionId($questionId = null, $comparison = null)
    {
        if (is_array($questionId)) {
            $useMinMax = false;
            if (isset($questionId['min'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $questionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($questionId['max'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $questionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $questionId, $comparison);
    }

    /**
     * Filter the query on the Answer column
     *
     * Example usage:
     * <code>
     * $query->filterByAnswer('fooValue');   // WHERE Answer = 'fooValue'
     * $query->filterByAnswer('%fooValue%', Criteria::LIKE); // WHERE Answer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $answer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByAnswer($answer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($answer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_ANSWER, $answer, $comparison);
    }

    /**
     * Filter the query on the response column
     *
     * Example usage:
     * <code>
     * $query->filterByResponse('fooValue');   // WHERE response = 'fooValue'
     * $query->filterByResponse('%fooValue%', Criteria::LIKE); // WHERE response LIKE '%fooValue%'
     * </code>
     *
     * @param     string $response The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByResponse($response = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($response)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_RESPONSE, $response, $comparison);
    }

    /**
     * Filter the query on the media_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMediaId(1234); // WHERE media_id = 1234
     * $query->filterByMediaId(array(12, 34)); // WHERE media_id IN (12, 34)
     * $query->filterByMediaId(array('min' => 12)); // WHERE media_id > 12
     * </code>
     *
     * @see       filterByMedia()
     *
     * @param     mixed $mediaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByMediaId($mediaId = null, $comparison = null)
    {
        if (is_array($mediaId)) {
            $useMinMax = false;
            if (isset($mediaId['min'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_MEDIA_ID, $mediaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mediaId['max'])) {
                $this->addUsingAlias(AnsweredQuestionsTableMap::COL_MEDIA_ID, $mediaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the responded column
     *
     * Example usage:
     * <code>
     * $query->filterByResponded(true); // WHERE responded = true
     * $query->filterByResponded('yes'); // WHERE responded = true
     * </code>
     *
     * @param     boolean|string $responded The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByResponded($responded = null, $comparison = null)
    {
        if (is_string($responded)) {
            $responded = in_array(strtolower($responded), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AnsweredQuestionsTableMap::COL_RESPONDED, $responded, $comparison);
    }

    /**
     * Filter the query by a related \Customer object
     *
     * @param \Customer|ObjectCollection $customer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof \Customer) {
            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $customer->getCustomerId(), $comparison);
        } elseif ($customer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_CUSTOMER_ID, $customer->toKeyValue('PrimaryKey', 'CustomerId'), $comparison);
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
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
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
     * Filter the query by a related \Questions object
     *
     * @param \Questions|ObjectCollection $questions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestions($questions, $comparison = null)
    {
        if ($questions instanceof \Questions) {
            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $questions->getQuestionId(), $comparison);
        } elseif ($questions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_QUESTION_ID, $questions->toKeyValue('PrimaryKey', 'QuestionId'), $comparison);
        } else {
            throw new PropelException('filterByQuestions() only accepts arguments of type \Questions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Questions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function joinQuestions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Questions');

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
            $this->addJoinObject($join, 'Questions');
        }

        return $this;
    }

    /**
     * Use the Questions relation Questions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \QuestionsQuery A secondary query class using the current class as primary query
     */
    public function useQuestionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuestions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Questions', '\QuestionsQuery');
    }

    /**
     * Filter the query by a related \Media object
     *
     * @param \Media|ObjectCollection $media The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof \Media) {
            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_MEDIA_ID, $media->getMediaId(), $comparison);
        } elseif ($media instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnsweredQuestionsTableMap::COL_MEDIA_ID, $media->toKeyValue('PrimaryKey', 'MediaId'), $comparison);
        } else {
            throw new PropelException('filterByMedia() only accepts arguments of type \Media or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Media relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function joinMedia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Media');

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
            $this->addJoinObject($join, 'Media');
        }

        return $this;
    }

    /**
     * Use the Media relation Media object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MediaQuery A secondary query class using the current class as primary query
     */
    public function useMediaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMedia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Media', '\MediaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAnsweredQuestions $answeredQuestions Object to remove from the list of results
     *
     * @return $this|ChildAnsweredQuestionsQuery The current query, for fluid interface
     */
    public function prune($answeredQuestions = null)
    {
        if ($answeredQuestions) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AnsweredQuestionsTableMap::COL_ID), $answeredQuestions->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AnsweredQuestionsTableMap::COL_CUSTOMER_ID), $answeredQuestions->getCustomerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(AnsweredQuestionsTableMap::COL_QUESTION_ID), $answeredQuestions->getQuestionId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the answered_questions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnsweredQuestionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnsweredQuestionsTableMap::clearInstancePool();
            AnsweredQuestionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AnsweredQuestionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AnsweredQuestionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AnsweredQuestionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AnsweredQuestionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AnsweredQuestionsQuery
