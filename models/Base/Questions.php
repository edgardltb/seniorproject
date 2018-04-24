<?php

namespace Base;

use \Category as ChildCategory;
use \CategoryQuery as ChildCategoryQuery;
use \Customer as ChildCustomer;
use \CustomerHasQuestions as ChildCustomerHasQuestions;
use \CustomerHasQuestionsQuery as ChildCustomerHasQuestionsQuery;
use \CustomerQuery as ChildCustomerQuery;
use \Media as ChildMedia;
use \MediaQuery as ChildMediaQuery;
use \Questions as ChildQuestions;
use \QuestionsQuery as ChildQuestionsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CustomerHasQuestionsTableMap;
use Map\MediaTableMap;
use Map\QuestionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'questions' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Questions implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\QuestionsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the question_id field.
     *
     * @var        int
     */
    protected $question_id;

    /**
     * The value for the question field.
     *
     * @var        string
     */
    protected $question;

    /**
     * The value for the response field.
     *
     * @var        string
     */
    protected $response;

    /**
     * The value for the category_id field.
     *
     * @var        int
     */
    protected $category_id;

    /**
     * The value for the answered field.
     *
     * @var        boolean
     */
    protected $answered;

    /**
     * The value for the datecreated field.
     *
     * @var        DateTime
     */
    protected $datecreated;

    /**
     * @var        ChildCategory
     */
    protected $aCategory;

    /**
     * @var        ObjectCollection|ChildCustomerHasQuestions[] Collection to store aggregation of ChildCustomerHasQuestions objects.
     */
    protected $collCustomerHasQuestionss;
    protected $collCustomerHasQuestionssPartial;

    /**
     * @var        ObjectCollection|ChildMedia[] Collection to store aggregation of ChildMedia objects.
     */
    protected $collMedias;
    protected $collMediasPartial;

    /**
     * @var        ObjectCollection|ChildCustomer[] Cross Collection to store aggregation of ChildCustomer objects.
     */
    protected $collCustomers;

    /**
     * @var bool
     */
    protected $collCustomersPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCustomer[]
     */
    protected $customersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCustomerHasQuestions[]
     */
    protected $customerHasQuestionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMedia[]
     */
    protected $mediasScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Questions object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Questions</code> instance.  If
     * <code>obj</code> is an instance of <code>Questions</code>, delegates to
     * <code>equals(Questions)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Questions The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [question_id] column value.
     *
     * @return int
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Get the [question] column value.
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Get the [response] column value.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the [category_id] column value.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Get the [answered] column value.
     *
     * @return boolean
     */
    public function getAnswered()
    {
        return $this->answered;
    }

    /**
     * Get the [answered] column value.
     *
     * @return boolean
     */
    public function isAnswered()
    {
        return $this->getAnswered();
    }

    /**
     * Get the [optionally formatted] temporal [datecreated] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatecreated($format = NULL)
    {
        if ($format === null) {
            return $this->datecreated;
        } else {
            return $this->datecreated instanceof \DateTimeInterface ? $this->datecreated->format($format) : null;
        }
    }

    /**
     * Set the value of [question_id] column.
     *
     * @param int $v new value
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setQuestionId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->question_id !== $v) {
            $this->question_id = $v;
            $this->modifiedColumns[QuestionsTableMap::COL_QUESTION_ID] = true;
        }

        return $this;
    } // setQuestionId()

    /**
     * Set the value of [question] column.
     *
     * @param string $v new value
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setQuestion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->question !== $v) {
            $this->question = $v;
            $this->modifiedColumns[QuestionsTableMap::COL_QUESTION] = true;
        }

        return $this;
    } // setQuestion()

    /**
     * Set the value of [response] column.
     *
     * @param string $v new value
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setResponse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->response !== $v) {
            $this->response = $v;
            $this->modifiedColumns[QuestionsTableMap::COL_RESPONSE] = true;
        }

        return $this;
    } // setResponse()

    /**
     * Set the value of [category_id] column.
     *
     * @param int $v new value
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->category_id !== $v) {
            $this->category_id = $v;
            $this->modifiedColumns[QuestionsTableMap::COL_CATEGORY_ID] = true;
        }

        if ($this->aCategory !== null && $this->aCategory->getCategorieId() !== $v) {
            $this->aCategory = null;
        }

        return $this;
    } // setCategoryId()

    /**
     * Sets the value of the [answered] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setAnswered($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->answered !== $v) {
            $this->answered = $v;
            $this->modifiedColumns[QuestionsTableMap::COL_ANSWERED] = true;
        }

        return $this;
    } // setAnswered()

    /**
     * Sets the value of [datecreated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function setDatecreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datecreated !== null || $dt !== null) {
            if ($this->datecreated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->datecreated->format("Y-m-d H:i:s.u")) {
                $this->datecreated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[QuestionsTableMap::COL_DATECREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDatecreated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : QuestionsTableMap::translateFieldName('QuestionId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->question_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : QuestionsTableMap::translateFieldName('Question', TableMap::TYPE_PHPNAME, $indexType)];
            $this->question = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : QuestionsTableMap::translateFieldName('Response', TableMap::TYPE_PHPNAME, $indexType)];
            $this->response = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : QuestionsTableMap::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->category_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : QuestionsTableMap::translateFieldName('Answered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->answered = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : QuestionsTableMap::translateFieldName('Datecreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->datecreated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = QuestionsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Questions'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aCategory !== null && $this->category_id !== $this->aCategory->getCategorieId()) {
            $this->aCategory = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuestionsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildQuestionsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategory = null;
            $this->collCustomerHasQuestionss = null;

            $this->collMedias = null;

            $this->collCustomers = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Questions::setDeleted()
     * @see Questions::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuestionsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildQuestionsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuestionsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                QuestionsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategory !== null) {
                if ($this->aCategory->isModified() || $this->aCategory->isNew()) {
                    $affectedRows += $this->aCategory->save($con);
                }
                $this->setCategory($this->aCategory);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->customersScheduledForDeletion !== null) {
                if (!$this->customersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->customersScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getQuestionId();
                        $entryPk[0] = $entry->getCustomerId();
                        $pks[] = $entryPk;
                    }

                    \CustomerHasQuestionsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->customersScheduledForDeletion = null;
                }

            }

            if ($this->collCustomers) {
                foreach ($this->collCustomers as $customer) {
                    if (!$customer->isDeleted() && ($customer->isNew() || $customer->isModified())) {
                        $customer->save($con);
                    }
                }
            }


            if ($this->customerHasQuestionssScheduledForDeletion !== null) {
                if (!$this->customerHasQuestionssScheduledForDeletion->isEmpty()) {
                    \CustomerHasQuestionsQuery::create()
                        ->filterByPrimaryKeys($this->customerHasQuestionssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->customerHasQuestionssScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerHasQuestionss !== null) {
                foreach ($this->collCustomerHasQuestionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mediasScheduledForDeletion !== null) {
                if (!$this->mediasScheduledForDeletion->isEmpty()) {
                    \MediaQuery::create()
                        ->filterByPrimaryKeys($this->mediasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mediasScheduledForDeletion = null;
                }
            }

            if ($this->collMedias !== null) {
                foreach ($this->collMedias as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[QuestionsTableMap::COL_QUESTION_ID] = true;
        if (null !== $this->question_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuestionsTableMap::COL_QUESTION_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(QuestionsTableMap::COL_QUESTION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'question_id';
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_QUESTION)) {
            $modifiedColumns[':p' . $index++]  = 'question';
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_RESPONSE)) {
            $modifiedColumns[':p' . $index++]  = 'response';
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'Category_id';
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_ANSWERED)) {
            $modifiedColumns[':p' . $index++]  = 'answered';
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_DATECREATED)) {
            $modifiedColumns[':p' . $index++]  = 'datecreated';
        }

        $sql = sprintf(
            'INSERT INTO questions (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'question_id':
                        $stmt->bindValue($identifier, $this->question_id, PDO::PARAM_INT);
                        break;
                    case 'question':
                        $stmt->bindValue($identifier, $this->question, PDO::PARAM_STR);
                        break;
                    case 'response':
                        $stmt->bindValue($identifier, $this->response, PDO::PARAM_STR);
                        break;
                    case 'Category_id':
                        $stmt->bindValue($identifier, $this->category_id, PDO::PARAM_INT);
                        break;
                    case 'answered':
                        $stmt->bindValue($identifier, (int) $this->answered, PDO::PARAM_INT);
                        break;
                    case 'datecreated':
                        $stmt->bindValue($identifier, $this->datecreated ? $this->datecreated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setQuestionId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = QuestionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getQuestionId();
                break;
            case 1:
                return $this->getQuestion();
                break;
            case 2:
                return $this->getResponse();
                break;
            case 3:
                return $this->getCategoryId();
                break;
            case 4:
                return $this->getAnswered();
                break;
            case 5:
                return $this->getDatecreated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Questions'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Questions'][$this->hashCode()] = true;
        $keys = QuestionsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getQuestionId(),
            $keys[1] => $this->getQuestion(),
            $keys[2] => $this->getResponse(),
            $keys[3] => $this->getCategoryId(),
            $keys[4] => $this->getAnswered(),
            $keys[5] => $this->getDatecreated(),
        );
        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCategory) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'category';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'category';
                        break;
                    default:
                        $key = 'Category';
                }

                $result[$key] = $this->aCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCustomerHasQuestionss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'customerHasQuestionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'customer_has_questionss';
                        break;
                    default:
                        $key = 'CustomerHasQuestionss';
                }

                $result[$key] = $this->collCustomerHasQuestionss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMedias) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'medias';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'medias';
                        break;
                    default:
                        $key = 'Medias';
                }

                $result[$key] = $this->collMedias->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Questions
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = QuestionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Questions
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setQuestionId($value);
                break;
            case 1:
                $this->setQuestion($value);
                break;
            case 2:
                $this->setResponse($value);
                break;
            case 3:
                $this->setCategoryId($value);
                break;
            case 4:
                $this->setAnswered($value);
                break;
            case 5:
                $this->setDatecreated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = QuestionsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setQuestionId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setQuestion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setResponse($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCategoryId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAnswered($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDatecreated($arr[$keys[5]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Questions The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuestionsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(QuestionsTableMap::COL_QUESTION_ID)) {
            $criteria->add(QuestionsTableMap::COL_QUESTION_ID, $this->question_id);
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_QUESTION)) {
            $criteria->add(QuestionsTableMap::COL_QUESTION, $this->question);
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_RESPONSE)) {
            $criteria->add(QuestionsTableMap::COL_RESPONSE, $this->response);
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_CATEGORY_ID)) {
            $criteria->add(QuestionsTableMap::COL_CATEGORY_ID, $this->category_id);
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_ANSWERED)) {
            $criteria->add(QuestionsTableMap::COL_ANSWERED, $this->answered);
        }
        if ($this->isColumnModified(QuestionsTableMap::COL_DATECREATED)) {
            $criteria->add(QuestionsTableMap::COL_DATECREATED, $this->datecreated);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildQuestionsQuery::create();
        $criteria->add(QuestionsTableMap::COL_QUESTION_ID, $this->question_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getQuestionId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getQuestionId();
    }

    /**
     * Generic method to set the primary key (question_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setQuestionId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getQuestionId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Questions (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setQuestion($this->getQuestion());
        $copyObj->setResponse($this->getResponse());
        $copyObj->setCategoryId($this->getCategoryId());
        $copyObj->setAnswered($this->getAnswered());
        $copyObj->setDatecreated($this->getDatecreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCustomerHasQuestionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerHasQuestions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMedias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMedia($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setQuestionId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Questions Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildCategory object.
     *
     * @param  ChildCategory $v
     * @return $this|\Questions The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategory(ChildCategory $v = null)
    {
        if ($v === null) {
            $this->setCategoryId(NULL);
        } else {
            $this->setCategoryId($v->getCategorieId());
        }

        $this->aCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addQuestions($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCategory object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCategory The associated ChildCategory object.
     * @throws PropelException
     */
    public function getCategory(ConnectionInterface $con = null)
    {
        if ($this->aCategory === null && ($this->category_id != 0)) {
            $this->aCategory = ChildCategoryQuery::create()->findPk($this->category_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategory->addQuestionss($this);
             */
        }

        return $this->aCategory;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CustomerHasQuestions' == $relationName) {
            $this->initCustomerHasQuestionss();
            return;
        }
        if ('Media' == $relationName) {
            $this->initMedias();
            return;
        }
    }

    /**
     * Clears out the collCustomerHasQuestionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCustomerHasQuestionss()
     */
    public function clearCustomerHasQuestionss()
    {
        $this->collCustomerHasQuestionss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCustomerHasQuestionss collection loaded partially.
     */
    public function resetPartialCustomerHasQuestionss($v = true)
    {
        $this->collCustomerHasQuestionssPartial = $v;
    }

    /**
     * Initializes the collCustomerHasQuestionss collection.
     *
     * By default this just sets the collCustomerHasQuestionss collection to an empty array (like clearcollCustomerHasQuestionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerHasQuestionss($overrideExisting = true)
    {
        if (null !== $this->collCustomerHasQuestionss && !$overrideExisting) {
            return;
        }

        $collectionClassName = CustomerHasQuestionsTableMap::getTableMap()->getCollectionClassName();

        $this->collCustomerHasQuestionss = new $collectionClassName;
        $this->collCustomerHasQuestionss->setModel('\CustomerHasQuestions');
    }

    /**
     * Gets an array of ChildCustomerHasQuestions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildQuestions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCustomerHasQuestions[] List of ChildCustomerHasQuestions objects
     * @throws PropelException
     */
    public function getCustomerHasQuestionss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomerHasQuestionssPartial && !$this->isNew();
        if (null === $this->collCustomerHasQuestionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerHasQuestionss) {
                // return empty collection
                $this->initCustomerHasQuestionss();
            } else {
                $collCustomerHasQuestionss = ChildCustomerHasQuestionsQuery::create(null, $criteria)
                    ->filterByQuestions($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCustomerHasQuestionssPartial && count($collCustomerHasQuestionss)) {
                        $this->initCustomerHasQuestionss(false);

                        foreach ($collCustomerHasQuestionss as $obj) {
                            if (false == $this->collCustomerHasQuestionss->contains($obj)) {
                                $this->collCustomerHasQuestionss->append($obj);
                            }
                        }

                        $this->collCustomerHasQuestionssPartial = true;
                    }

                    return $collCustomerHasQuestionss;
                }

                if ($partial && $this->collCustomerHasQuestionss) {
                    foreach ($this->collCustomerHasQuestionss as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerHasQuestionss[] = $obj;
                        }
                    }
                }

                $this->collCustomerHasQuestionss = $collCustomerHasQuestionss;
                $this->collCustomerHasQuestionssPartial = false;
            }
        }

        return $this->collCustomerHasQuestionss;
    }

    /**
     * Sets a collection of ChildCustomerHasQuestions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $customerHasQuestionss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildQuestions The current object (for fluent API support)
     */
    public function setCustomerHasQuestionss(Collection $customerHasQuestionss, ConnectionInterface $con = null)
    {
        /** @var ChildCustomerHasQuestions[] $customerHasQuestionssToDelete */
        $customerHasQuestionssToDelete = $this->getCustomerHasQuestionss(new Criteria(), $con)->diff($customerHasQuestionss);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->customerHasQuestionssScheduledForDeletion = clone $customerHasQuestionssToDelete;

        foreach ($customerHasQuestionssToDelete as $customerHasQuestionsRemoved) {
            $customerHasQuestionsRemoved->setQuestions(null);
        }

        $this->collCustomerHasQuestionss = null;
        foreach ($customerHasQuestionss as $customerHasQuestions) {
            $this->addCustomerHasQuestions($customerHasQuestions);
        }

        $this->collCustomerHasQuestionss = $customerHasQuestionss;
        $this->collCustomerHasQuestionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CustomerHasQuestions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CustomerHasQuestions objects.
     * @throws PropelException
     */
    public function countCustomerHasQuestionss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomerHasQuestionssPartial && !$this->isNew();
        if (null === $this->collCustomerHasQuestionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerHasQuestionss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerHasQuestionss());
            }

            $query = ChildCustomerHasQuestionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuestions($this)
                ->count($con);
        }

        return count($this->collCustomerHasQuestionss);
    }

    /**
     * Method called to associate a ChildCustomerHasQuestions object to this object
     * through the ChildCustomerHasQuestions foreign key attribute.
     *
     * @param  ChildCustomerHasQuestions $l ChildCustomerHasQuestions
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function addCustomerHasQuestions(ChildCustomerHasQuestions $l)
    {
        if ($this->collCustomerHasQuestionss === null) {
            $this->initCustomerHasQuestionss();
            $this->collCustomerHasQuestionssPartial = true;
        }

        if (!$this->collCustomerHasQuestionss->contains($l)) {
            $this->doAddCustomerHasQuestions($l);

            if ($this->customerHasQuestionssScheduledForDeletion and $this->customerHasQuestionssScheduledForDeletion->contains($l)) {
                $this->customerHasQuestionssScheduledForDeletion->remove($this->customerHasQuestionssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCustomerHasQuestions $customerHasQuestions The ChildCustomerHasQuestions object to add.
     */
    protected function doAddCustomerHasQuestions(ChildCustomerHasQuestions $customerHasQuestions)
    {
        $this->collCustomerHasQuestionss[]= $customerHasQuestions;
        $customerHasQuestions->setQuestions($this);
    }

    /**
     * @param  ChildCustomerHasQuestions $customerHasQuestions The ChildCustomerHasQuestions object to remove.
     * @return $this|ChildQuestions The current object (for fluent API support)
     */
    public function removeCustomerHasQuestions(ChildCustomerHasQuestions $customerHasQuestions)
    {
        if ($this->getCustomerHasQuestionss()->contains($customerHasQuestions)) {
            $pos = $this->collCustomerHasQuestionss->search($customerHasQuestions);
            $this->collCustomerHasQuestionss->remove($pos);
            if (null === $this->customerHasQuestionssScheduledForDeletion) {
                $this->customerHasQuestionssScheduledForDeletion = clone $this->collCustomerHasQuestionss;
                $this->customerHasQuestionssScheduledForDeletion->clear();
            }
            $this->customerHasQuestionssScheduledForDeletion[]= clone $customerHasQuestions;
            $customerHasQuestions->setQuestions(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Questions is new, it will return
     * an empty collection; or if this Questions has previously
     * been saved, it will retrieve related CustomerHasQuestionss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Questions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCustomerHasQuestions[] List of ChildCustomerHasQuestions objects
     */
    public function getCustomerHasQuestionssJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCustomerHasQuestionsQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getCustomerHasQuestionss($query, $con);
    }

    /**
     * Clears out the collMedias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMedias()
     */
    public function clearMedias()
    {
        $this->collMedias = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMedias collection loaded partially.
     */
    public function resetPartialMedias($v = true)
    {
        $this->collMediasPartial = $v;
    }

    /**
     * Initializes the collMedias collection.
     *
     * By default this just sets the collMedias collection to an empty array (like clearcollMedias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMedias($overrideExisting = true)
    {
        if (null !== $this->collMedias && !$overrideExisting) {
            return;
        }

        $collectionClassName = MediaTableMap::getTableMap()->getCollectionClassName();

        $this->collMedias = new $collectionClassName;
        $this->collMedias->setModel('\Media');
    }

    /**
     * Gets an array of ChildMedia objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildQuestions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMedia[] List of ChildMedia objects
     * @throws PropelException
     */
    public function getMedias(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMediasPartial && !$this->isNew();
        if (null === $this->collMedias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMedias) {
                // return empty collection
                $this->initMedias();
            } else {
                $collMedias = ChildMediaQuery::create(null, $criteria)
                    ->filterByQuestions($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMediasPartial && count($collMedias)) {
                        $this->initMedias(false);

                        foreach ($collMedias as $obj) {
                            if (false == $this->collMedias->contains($obj)) {
                                $this->collMedias->append($obj);
                            }
                        }

                        $this->collMediasPartial = true;
                    }

                    return $collMedias;
                }

                if ($partial && $this->collMedias) {
                    foreach ($this->collMedias as $obj) {
                        if ($obj->isNew()) {
                            $collMedias[] = $obj;
                        }
                    }
                }

                $this->collMedias = $collMedias;
                $this->collMediasPartial = false;
            }
        }

        return $this->collMedias;
    }

    /**
     * Sets a collection of ChildMedia objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $medias A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildQuestions The current object (for fluent API support)
     */
    public function setMedias(Collection $medias, ConnectionInterface $con = null)
    {
        /** @var ChildMedia[] $mediasToDelete */
        $mediasToDelete = $this->getMedias(new Criteria(), $con)->diff($medias);


        $this->mediasScheduledForDeletion = $mediasToDelete;

        foreach ($mediasToDelete as $mediaRemoved) {
            $mediaRemoved->setQuestions(null);
        }

        $this->collMedias = null;
        foreach ($medias as $media) {
            $this->addMedia($media);
        }

        $this->collMedias = $medias;
        $this->collMediasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Media objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Media objects.
     * @throws PropelException
     */
    public function countMedias(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMediasPartial && !$this->isNew();
        if (null === $this->collMedias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMedias) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMedias());
            }

            $query = ChildMediaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuestions($this)
                ->count($con);
        }

        return count($this->collMedias);
    }

    /**
     * Method called to associate a ChildMedia object to this object
     * through the ChildMedia foreign key attribute.
     *
     * @param  ChildMedia $l ChildMedia
     * @return $this|\Questions The current object (for fluent API support)
     */
    public function addMedia(ChildMedia $l)
    {
        if ($this->collMedias === null) {
            $this->initMedias();
            $this->collMediasPartial = true;
        }

        if (!$this->collMedias->contains($l)) {
            $this->doAddMedia($l);

            if ($this->mediasScheduledForDeletion and $this->mediasScheduledForDeletion->contains($l)) {
                $this->mediasScheduledForDeletion->remove($this->mediasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMedia $media The ChildMedia object to add.
     */
    protected function doAddMedia(ChildMedia $media)
    {
        $this->collMedias[]= $media;
        $media->setQuestions($this);
    }

    /**
     * @param  ChildMedia $media The ChildMedia object to remove.
     * @return $this|ChildQuestions The current object (for fluent API support)
     */
    public function removeMedia(ChildMedia $media)
    {
        if ($this->getMedias()->contains($media)) {
            $pos = $this->collMedias->search($media);
            $this->collMedias->remove($pos);
            if (null === $this->mediasScheduledForDeletion) {
                $this->mediasScheduledForDeletion = clone $this->collMedias;
                $this->mediasScheduledForDeletion->clear();
            }
            $this->mediasScheduledForDeletion[]= clone $media;
            $media->setQuestions(null);
        }

        return $this;
    }

    /**
     * Clears out the collCustomers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCustomers()
     */
    public function clearCustomers()
    {
        $this->collCustomers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCustomers crossRef collection.
     *
     * By default this just sets the collCustomers collection to an empty collection (like clearCustomers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCustomers()
    {
        $collectionClassName = CustomerHasQuestionsTableMap::getTableMap()->getCollectionClassName();

        $this->collCustomers = new $collectionClassName;
        $this->collCustomersPartial = true;
        $this->collCustomers->setModel('\Customer');
    }

    /**
     * Checks if the collCustomers collection is loaded.
     *
     * @return bool
     */
    public function isCustomersLoaded()
    {
        return null !== $this->collCustomers;
    }

    /**
     * Gets a collection of ChildCustomer objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildQuestions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCustomer[] List of ChildCustomer objects
     */
    public function getCustomers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCustomers) {
                    $this->initCustomers();
                }
            } else {

                $query = ChildCustomerQuery::create(null, $criteria)
                    ->filterByQuestions($this);
                $collCustomers = $query->find($con);
                if (null !== $criteria) {
                    return $collCustomers;
                }

                if ($partial && $this->collCustomers) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCustomers as $obj) {
                        if (!$collCustomers->contains($obj)) {
                            $collCustomers[] = $obj;
                        }
                    }
                }

                $this->collCustomers = $collCustomers;
                $this->collCustomersPartial = false;
            }
        }

        return $this->collCustomers;
    }

    /**
     * Sets a collection of Customer objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $customers A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildQuestions The current object (for fluent API support)
     */
    public function setCustomers(Collection $customers, ConnectionInterface $con = null)
    {
        $this->clearCustomers();
        $currentCustomers = $this->getCustomers();

        $customersScheduledForDeletion = $currentCustomers->diff($customers);

        foreach ($customersScheduledForDeletion as $toDelete) {
            $this->removeCustomer($toDelete);
        }

        foreach ($customers as $customer) {
            if (!$currentCustomers->contains($customer)) {
                $this->doAddCustomer($customer);
            }
        }

        $this->collCustomersPartial = false;
        $this->collCustomers = $customers;

        return $this;
    }

    /**
     * Gets the number of Customer objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related Customer objects
     */
    public function countCustomers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomers) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCustomers());
                }

                $query = ChildCustomerQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByQuestions($this)
                    ->count($con);
            }
        } else {
            return count($this->collCustomers);
        }
    }

    /**
     * Associate a ChildCustomer to this object
     * through the customer_has_questions cross reference table.
     *
     * @param ChildCustomer $customer
     * @return ChildQuestions The current object (for fluent API support)
     */
    public function addCustomer(ChildCustomer $customer)
    {
        if ($this->collCustomers === null) {
            $this->initCustomers();
        }

        if (!$this->getCustomers()->contains($customer)) {
            // only add it if the **same** object is not already associated
            $this->collCustomers->push($customer);
            $this->doAddCustomer($customer);
        }

        return $this;
    }

    /**
     *
     * @param ChildCustomer $customer
     */
    protected function doAddCustomer(ChildCustomer $customer)
    {
        $customerHasQuestions = new ChildCustomerHasQuestions();

        $customerHasQuestions->setCustomer($customer);

        $customerHasQuestions->setQuestions($this);

        $this->addCustomerHasQuestions($customerHasQuestions);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$customer->isQuestionssLoaded()) {
            $customer->initQuestionss();
            $customer->getQuestionss()->push($this);
        } elseif (!$customer->getQuestionss()->contains($this)) {
            $customer->getQuestionss()->push($this);
        }

    }

    /**
     * Remove customer of this object
     * through the customer_has_questions cross reference table.
     *
     * @param ChildCustomer $customer
     * @return ChildQuestions The current object (for fluent API support)
     */
    public function removeCustomer(ChildCustomer $customer)
    {
        if ($this->getCustomers()->contains($customer)) {
            $customerHasQuestions = new ChildCustomerHasQuestions();
            $customerHasQuestions->setCustomer($customer);
            if ($customer->isQuestionssLoaded()) {
                //remove the back reference if available
                $customer->getQuestionss()->removeObject($this);
            }

            $customerHasQuestions->setQuestions($this);
            $this->removeCustomerHasQuestions(clone $customerHasQuestions);
            $customerHasQuestions->clear();

            $this->collCustomers->remove($this->collCustomers->search($customer));

            if (null === $this->customersScheduledForDeletion) {
                $this->customersScheduledForDeletion = clone $this->collCustomers;
                $this->customersScheduledForDeletion->clear();
            }

            $this->customersScheduledForDeletion->push($customer);
        }


        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCategory) {
            $this->aCategory->removeQuestions($this);
        }
        $this->question_id = null;
        $this->question = null;
        $this->response = null;
        $this->category_id = null;
        $this->answered = null;
        $this->datecreated = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCustomerHasQuestionss) {
                foreach ($this->collCustomerHasQuestionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMedias) {
                foreach ($this->collMedias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomers) {
                foreach ($this->collCustomers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCustomerHasQuestionss = null;
        $this->collMedias = null;
        $this->collCustomers = null;
        $this->aCategory = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuestionsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
