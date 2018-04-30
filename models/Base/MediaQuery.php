<?php

namespace Base;

use \Media as ChildMedia;
use \MediaQuery as ChildMediaQuery;
use \Exception;
use \PDO;
use Map\MediaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'media' table.
 *
 *
 *
 * @method     ChildMediaQuery orderByMediaId($order = Criteria::ASC) Order by the Media_id column
 * @method     ChildMediaQuery orderByVideo($order = Criteria::ASC) Order by the video column
 * @method     ChildMediaQuery orderByLink($order = Criteria::ASC) Order by the link column
 *
 * @method     ChildMediaQuery groupByMediaId() Group by the Media_id column
 * @method     ChildMediaQuery groupByVideo() Group by the video column
 * @method     ChildMediaQuery groupByLink() Group by the link column
 *
 * @method     ChildMediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMediaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMediaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMediaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMediaQuery leftJoinAnsweredQuestions($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnsweredQuestions relation
 * @method     ChildMediaQuery rightJoinAnsweredQuestions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnsweredQuestions relation
 * @method     ChildMediaQuery innerJoinAnsweredQuestions($relationAlias = null) Adds a INNER JOIN clause to the query using the AnsweredQuestions relation
 *
 * @method     ChildMediaQuery joinWithAnsweredQuestions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnsweredQuestions relation
 *
 * @method     ChildMediaQuery leftJoinWithAnsweredQuestions() Adds a LEFT JOIN clause and with to the query using the AnsweredQuestions relation
 * @method     ChildMediaQuery rightJoinWithAnsweredQuestions() Adds a RIGHT JOIN clause and with to the query using the AnsweredQuestions relation
 * @method     ChildMediaQuery innerJoinWithAnsweredQuestions() Adds a INNER JOIN clause and with to the query using the AnsweredQuestions relation
 *
 * @method     \AnsweredQuestionsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMedia findOne(ConnectionInterface $con = null) Return the first ChildMedia matching the query
 * @method     ChildMedia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMedia matching the query, or a new ChildMedia object populated from the query conditions when no match is found
 *
 * @method     ChildMedia findOneByMediaId(int $Media_id) Return the first ChildMedia filtered by the Media_id column
 * @method     ChildMedia findOneByVideo(boolean $video) Return the first ChildMedia filtered by the video column
 * @method     ChildMedia findOneByLink(string $link) Return the first ChildMedia filtered by the link column *

 * @method     ChildMedia requirePk($key, ConnectionInterface $con = null) Return the ChildMedia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOne(ConnectionInterface $con = null) Return the first ChildMedia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedia requireOneByMediaId(int $Media_id) Return the first ChildMedia filtered by the Media_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByVideo(boolean $video) Return the first ChildMedia filtered by the video column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedia requireOneByLink(string $link) Return the first ChildMedia filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMedia objects based on current ModelCriteria
 * @method     ChildMedia[]|ObjectCollection findByMediaId(int $Media_id) Return ChildMedia objects filtered by the Media_id column
 * @method     ChildMedia[]|ObjectCollection findByVideo(boolean $video) Return ChildMedia objects filtered by the video column
 * @method     ChildMedia[]|ObjectCollection findByLink(string $link) Return ChildMedia objects filtered by the link column
 * @method     ChildMedia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MediaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MediaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Media', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMediaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMediaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMediaQuery) {
            return $criteria;
        }
        $query = new ChildMediaQuery();
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
     * @return ChildMedia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MediaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MediaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMedia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Media_id, video, link FROM media WHERE Media_id = :p0';
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
            /** @var ChildMedia $obj */
            $obj = new ChildMedia();
            $obj->hydrate($row);
            MediaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMedia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Media_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMediaId(1234); // WHERE Media_id = 1234
     * $query->filterByMediaId(array(12, 34)); // WHERE Media_id IN (12, 34)
     * $query->filterByMediaId(array('min' => 12)); // WHERE Media_id > 12
     * </code>
     *
     * @param     mixed $mediaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByMediaId($mediaId = null, $comparison = null)
    {
        if (is_array($mediaId)) {
            $useMinMax = false;
            if (isset($mediaId['min'])) {
                $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $mediaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mediaId['max'])) {
                $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $mediaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the video column
     *
     * Example usage:
     * <code>
     * $query->filterByVideo(true); // WHERE video = true
     * $query->filterByVideo('yes'); // WHERE video = true
     * </code>
     *
     * @param     boolean|string $video The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByVideo($video = null, $comparison = null)
    {
        if (is_string($video)) {
            $video = in_array(strtolower($video), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(MediaTableMap::COL_VIDEO, $video, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MediaTableMap::COL_LINK, $link, $comparison);
    }

    /**
     * Filter the query by a related \AnsweredQuestions object
     *
     * @param \AnsweredQuestions|ObjectCollection $answeredQuestions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMediaQuery The current query, for fluid interface
     */
    public function filterByAnsweredQuestions($answeredQuestions, $comparison = null)
    {
        if ($answeredQuestions instanceof \AnsweredQuestions) {
            return $this
                ->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $answeredQuestions->getMediaId(), $comparison);
        } elseif ($answeredQuestions instanceof ObjectCollection) {
            return $this
                ->useAnsweredQuestionsQuery()
                ->filterByPrimaryKeys($answeredQuestions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnsweredQuestions() only accepts arguments of type \AnsweredQuestions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnsweredQuestions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function joinAnsweredQuestions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnsweredQuestions');

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
            $this->addJoinObject($join, 'AnsweredQuestions');
        }

        return $this;
    }

    /**
     * Use the AnsweredQuestions relation AnsweredQuestions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnsweredQuestionsQuery A secondary query class using the current class as primary query
     */
    public function useAnsweredQuestionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAnsweredQuestions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnsweredQuestions', '\AnsweredQuestionsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMedia $media Object to remove from the list of results
     *
     * @return $this|ChildMediaQuery The current query, for fluid interface
     */
    public function prune($media = null)
    {
        if ($media) {
            $this->addUsingAlias(MediaTableMap::COL_MEDIA_ID, $media->getMediaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the media table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MediaTableMap::clearInstancePool();
            MediaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MediaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MediaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MediaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MediaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MediaQuery
