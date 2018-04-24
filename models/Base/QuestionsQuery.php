<?php

namespace Base;

use \Questions as ChildQuestions;
use \QuestionsQuery as ChildQuestionsQuery;
use \Exception;
use \PDO;
use Map\QuestionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'questions' table.
 *
 *
 *
 * @method     ChildQuestionsQuery orderByQuestionId($order = Criteria::ASC) Order by the question_id column
 * @method     ChildQuestionsQuery orderByQuestion($order = Criteria::ASC) Order by the question column
 * @method     ChildQuestionsQuery orderByResponse($order = Criteria::ASC) Order by the response column
 * @method     ChildQuestionsQuery orderByCategoryId($order = Criteria::ASC) Order by the Category_id column
 * @method     ChildQuestionsQuery orderByAnswered($order = Criteria::ASC) Order by the answered column
 * @method     ChildQuestionsQuery orderByDatecreated($order = Criteria::ASC) Order by the datecreated column
 *
 * @method     ChildQuestionsQuery groupByQuestionId() Group by the question_id column
 * @method     ChildQuestionsQuery groupByQuestion() Group by the question column
 * @method     ChildQuestionsQuery groupByResponse() Group by the response column
 * @method     ChildQuestionsQuery groupByCategoryId() Group by the Category_id column
 * @method     ChildQuestionsQuery groupByAnswered() Group by the answered column
 * @method     ChildQuestionsQuery groupByDatecreated() Group by the datecreated column
 *
 * @method     ChildQuestionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQuestionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQuestionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQuestionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQuestionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQuestionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQuestionsQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ChildQuestionsQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ChildQuestionsQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ChildQuestionsQuery joinWithCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Category relation
 *
 * @method     ChildQuestionsQuery leftJoinWithCategory() Adds a LEFT JOIN clause and with to the query using the Category relation
 * @method     ChildQuestionsQuery rightJoinWithCategory() Adds a RIGHT JOIN clause and with to the query using the Category relation
 * @method     ChildQuestionsQuery innerJoinWithCategory() Adds a INNER JOIN clause and with to the query using the Category relation
 *
 * @method     ChildQuestionsQuery leftJoinCustomerHasQuestions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerHasQuestions relation
 * @method     ChildQuestionsQuery rightJoinCustomerHasQuestions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerHasQuestions relation
 * @method     ChildQuestionsQuery innerJoinCustomerHasQuestions($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerHasQuestions relation
 *
 * @method     ChildQuestionsQuery joinWithCustomerHasQuestions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CustomerHasQuestions relation
 *
 * @method     ChildQuestionsQuery leftJoinWithCustomerHasQuestions() Adds a LEFT JOIN clause and with to the query using the CustomerHasQuestions relation
 * @method     ChildQuestionsQuery rightJoinWithCustomerHasQuestions() Adds a RIGHT JOIN clause and with to the query using the CustomerHasQuestions relation
 * @method     ChildQuestionsQuery innerJoinWithCustomerHasQuestions() Adds a INNER JOIN clause and with to the query using the CustomerHasQuestions relation
 *
 * @method     ChildQuestionsQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method     ChildQuestionsQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method     ChildQuestionsQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method     ChildQuestionsQuery joinWithMedia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Media relation
 *
 * @method     ChildQuestionsQuery leftJoinWithMedia() Adds a LEFT JOIN clause and with to the query using the Media relation
 * @method     ChildQuestionsQuery rightJoinWithMedia() Adds a RIGHT JOIN clause and with to the query using the Media relation
 * @method     ChildQuestionsQuery innerJoinWithMedia() Adds a INNER JOIN clause and with to the query using the Media relation
 *
 * @method     \CategoryQuery|\CustomerHasQuestionsQuery|\MediaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildQuestions findOne(ConnectionInterface $con = null) Return the first ChildQuestions matching the query
 * @method     ChildQuestions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQuestions matching the query, or a new ChildQuestions object populated from the query conditions when no match is found
 *
 * @method     ChildQuestions findOneByQuestionId(int $question_id) Return the first ChildQuestions filtered by the question_id column
 * @method     ChildQuestions findOneByQuestion(string $question) Return the first ChildQuestions filtered by the question column
 * @method     ChildQuestions findOneByResponse(string $response) Return the first ChildQuestions filtered by the response column
 * @method     ChildQuestions findOneByCategoryId(int $Category_id) Return the first ChildQuestions filtered by the Category_id column
 * @method     ChildQuestions findOneByAnswered(boolean $answered) Return the first ChildQuestions filtered by the answered column
 * @method     ChildQuestions findOneByDatecreated(string $datecreated) Return the first ChildQuestions filtered by the datecreated column *

 * @method     ChildQuestions requirePk($key, ConnectionInterface $con = null) Return the ChildQuestions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOne(ConnectionInterface $con = null) Return the first ChildQuestions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuestions requireOneByQuestionId(int $question_id) Return the first ChildQuestions filtered by the question_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOneByQuestion(string $question) Return the first ChildQuestions filtered by the question column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOneByResponse(string $response) Return the first ChildQuestions filtered by the response column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOneByCategoryId(int $Category_id) Return the first ChildQuestions filtered by the Category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOneByAnswered(boolean $answered) Return the first ChildQuestions filtered by the answered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuestions requireOneByDatecreated(string $datecreated) Return the first ChildQuestions filtered by the datecreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuestions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQuestions objects based on current ModelCriteria
 * @method     ChildQuestions[]|ObjectCollection findByQuestionId(int $question_id) Return ChildQuestions objects filtered by the question_id column
 * @method     ChildQuestions[]|ObjectCollection findByQuestion(string $question) Return ChildQuestions objects filtered by the question column
 * @method     ChildQuestions[]|ObjectCollection findByResponse(string $response) Return ChildQuestions objects filtered by the response column
 * @method     ChildQuestions[]|ObjectCollection findByCategoryId(int $Category_id) Return ChildQuestions objects filtered by the Category_id column
 * @method     ChildQuestions[]|ObjectCollection findByAnswered(boolean $answered) Return ChildQuestions objects filtered by the answered column
 * @method     ChildQuestions[]|ObjectCollection findByDatecreated(string $datecreated) Return ChildQuestions objects filtered by the datecreated column
 * @method     ChildQuestions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QuestionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QuestionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Questions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQuestionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQuestionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQuestionsQuery) {
            return $criteria;
        }
        $query = new ChildQuestionsQuery();
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
     * @return ChildQuestions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuestionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QuestionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildQuestions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT question_id, question, response, Category_id, answered, datecreated FROM questions WHERE question_id = :p0';
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
            /** @var ChildQuestions $obj */
            $obj = new ChildQuestions();
            $obj->hydrate($row);
            QuestionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildQuestions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the question_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestionId(1234); // WHERE question_id = 1234
     * $query->filterByQuestionId(array(12, 34)); // WHERE question_id IN (12, 34)
     * $query->filterByQuestionId(array('min' => 12)); // WHERE question_id > 12
     * </code>
     *
     * @param     mixed $questionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestionId($questionId = null, $comparison = null)
    {
        if (is_array($questionId)) {
            $useMinMax = false;
            if (isset($questionId['min'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $questionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($questionId['max'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $questionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $questionId, $comparison);
    }

    /**
     * Filter the query on the question column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestion('fooValue');   // WHERE question = 'fooValue'
     * $query->filterByQuestion('%fooValue%', Criteria::LIKE); // WHERE question LIKE '%fooValue%'
     * </code>
     *
     * @param     string $question The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestion($question = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($question)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_QUESTION, $question, $comparison);
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
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByResponse($response = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($response)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_RESPONSE, $response, $comparison);
    }

    /**
     * Filter the query on the Category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE Category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE Category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE Category_id > 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the answered column
     *
     * Example usage:
     * <code>
     * $query->filterByAnswered(true); // WHERE answered = true
     * $query->filterByAnswered('yes'); // WHERE answered = true
     * </code>
     *
     * @param     boolean|string $answered The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByAnswered($answered = null, $comparison = null)
    {
        if (is_string($answered)) {
            $answered = in_array(strtolower($answered), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_ANSWERED, $answered, $comparison);
    }

    /**
     * Filter the query on the datecreated column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreated('2011-03-14'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated('now'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated(array('max' => 'yesterday')); // WHERE datecreated > '2011-03-13'
     * </code>
     *
     * @param     mixed $datecreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, $comparison = null)
    {
        if (is_array($datecreated)) {
            $useMinMax = false;
            if (isset($datecreated['min'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_DATECREATED, $datecreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecreated['max'])) {
                $this->addUsingAlias(QuestionsTableMap::COL_DATECREATED, $datecreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuestionsTableMap::COL_DATECREATED, $datecreated, $comparison);
    }

    /**
     * Filter the query by a related \Category object
     *
     * @param \Category|ObjectCollection $category The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof \Category) {
            return $this
                ->addUsingAlias(QuestionsTableMap::COL_CATEGORY_ID, $category->getCategorieId(), $comparison);
        } elseif ($category instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuestionsTableMap::COL_CATEGORY_ID, $category->toKeyValue('PrimaryKey', 'CategorieId'), $comparison);
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
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
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
     * Filter the query by a related \CustomerHasQuestions object
     *
     * @param \CustomerHasQuestions|ObjectCollection $customerHasQuestions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByCustomerHasQuestions($customerHasQuestions, $comparison = null)
    {
        if ($customerHasQuestions instanceof \CustomerHasQuestions) {
            return $this
                ->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $customerHasQuestions->getQuestionsId(), $comparison);
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
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
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
     * Filter the query by a related \Media object
     *
     * @param \Media|ObjectCollection $media the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof \Media) {
            return $this
                ->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $media->getQuestionId(), $comparison);
        } elseif ($media instanceof ObjectCollection) {
            return $this
                ->useMediaQuery()
                ->filterByPrimaryKeys($media->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function joinMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Media', '\MediaQuery');
    }

    /**
     * Filter the query by a related Customer object
     * using the customer_has_questions table as cross reference
     *
     * @param Customer $customer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildQuestionsQuery The current query, for fluid interface
     */
    public function filterByCustomer($customer, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useCustomerHasQuestionsQuery()
            ->filterByCustomer($customer, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildQuestions $questions Object to remove from the list of results
     *
     * @return $this|ChildQuestionsQuery The current query, for fluid interface
     */
    public function prune($questions = null)
    {
        if ($questions) {
            $this->addUsingAlias(QuestionsTableMap::COL_QUESTION_ID, $questions->getQuestionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the questions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuestionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QuestionsTableMap::clearInstancePool();
            QuestionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QuestionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QuestionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QuestionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QuestionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QuestionsQuery
