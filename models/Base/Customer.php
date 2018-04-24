<?php

namespace Base;

use \Category as ChildCategory;
use \CategoryQuery as ChildCategoryQuery;
use \Customer as ChildCustomer;
use \CustomerHasQuestions as ChildCustomerHasQuestions;
use \CustomerHasQuestionsQuery as ChildCustomerHasQuestionsQuery;
use \CustomerQuery as ChildCustomerQuery;
use \Mentor as ChildMentor;
use \MentorQuery as ChildMentorQuery;
use \Questions as ChildQuestions;
use \QuestionsQuery as ChildQuestionsQuery;
use \Schedule as ChildSchedule;
use \ScheduleQuery as ChildScheduleQuery;
use \UserInfo as ChildUserInfo;
use \UserInfoQuery as ChildUserInfoQuery;
use \Exception;
use \PDO;
use Map\CustomerHasQuestionsTableMap;
use Map\CustomerTableMap;
use Map\ScheduleTableMap;
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

/**
 * Base class that represents a row from the 'customer' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Customer implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CustomerTableMap';


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
     * The value for the customer_id field.
     *
     * @var        int
     */
    protected $customer_id;

    /**
     * The value for the men field.
     *
     * @var        int
     */
    protected $men;

    /**
     * The value for the cat field.
     *
     * @var        int
     */
    protected $cat;

    /**
     * The value for the user_info_id field.
     *
     * @var        int
     */
    protected $user_info_id;

    /**
     * @var        ChildCategory
     */
    protected $aCategory;

    /**
     * @var        ChildMentor
     */
    protected $aMentor;

    /**
     * @var        ChildUserInfo
     */
    protected $aUserInfo;

    /**
     * @var        ObjectCollection|ChildCustomerHasQuestions[] Collection to store aggregation of ChildCustomerHasQuestions objects.
     */
    protected $collCustomerHasQuestionss;
    protected $collCustomerHasQuestionssPartial;

    /**
     * @var        ObjectCollection|ChildSchedule[] Collection to store aggregation of ChildSchedule objects.
     */
    protected $collSchedules;
    protected $collSchedulesPartial;

    /**
     * @var        ObjectCollection|ChildQuestions[] Cross Collection to store aggregation of ChildQuestions objects.
     */
    protected $collQuestionss;

    /**
     * @var bool
     */
    protected $collQuestionssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildQuestions[]
     */
    protected $questionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCustomerHasQuestions[]
     */
    protected $customerHasQuestionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSchedule[]
     */
    protected $schedulesScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Customer object.
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
     * Compares this with another <code>Customer</code> instance.  If
     * <code>obj</code> is an instance of <code>Customer</code>, delegates to
     * <code>equals(Customer)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Customer The current object, for fluid interface
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
     * Get the [customer_id] column value.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Get the [men] column value.
     *
     * @return int
     */
    public function getMen()
    {
        return $this->men;
    }

    /**
     * Get the [cat] column value.
     *
     * @return int
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * Get the [user_info_id] column value.
     *
     * @return int
     */
    public function getUserInfoId()
    {
        return $this->user_info_id;
    }

    /**
     * Set the value of [customer_id] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [men] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setMen($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->men !== $v) {
            $this->men = $v;
            $this->modifiedColumns[CustomerTableMap::COL_MEN] = true;
        }

        if ($this->aMentor !== null && $this->aMentor->getMentorId() !== $v) {
            $this->aMentor = null;
        }

        return $this;
    } // setMen()

    /**
     * Set the value of [cat] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCat($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cat !== $v) {
            $this->cat = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CAT] = true;
        }

        if ($this->aCategory !== null && $this->aCategory->getCategorieId() !== $v) {
            $this->aCategory = null;
        }

        return $this;
    } // setCat()

    /**
     * Set the value of [user_info_id] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setUserInfoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_info_id !== $v) {
            $this->user_info_id = $v;
            $this->modifiedColumns[CustomerTableMap::COL_USER_INFO_ID] = true;
        }

        if ($this->aUserInfo !== null && $this->aUserInfo->getUserId() !== $v) {
            $this->aUserInfo = null;
        }

        return $this;
    } // setUserInfoId()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CustomerTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CustomerTableMap::translateFieldName('Men', TableMap::TYPE_PHPNAME, $indexType)];
            $this->men = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CustomerTableMap::translateFieldName('Cat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CustomerTableMap::translateFieldName('UserInfoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_info_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = CustomerTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Customer'), 0, $e);
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
        if ($this->aMentor !== null && $this->men !== $this->aMentor->getMentorId()) {
            $this->aMentor = null;
        }
        if ($this->aCategory !== null && $this->cat !== $this->aCategory->getCategorieId()) {
            $this->aCategory = null;
        }
        if ($this->aUserInfo !== null && $this->user_info_id !== $this->aUserInfo->getUserId()) {
            $this->aUserInfo = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(CustomerTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCustomerQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategory = null;
            $this->aMentor = null;
            $this->aUserInfo = null;
            $this->collCustomerHasQuestionss = null;

            $this->collSchedules = null;

            $this->collQuestionss = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Customer::setDeleted()
     * @see Customer::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCustomerQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
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
                CustomerTableMap::addInstanceToPool($this);
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

            if ($this->aMentor !== null) {
                if ($this->aMentor->isModified() || $this->aMentor->isNew()) {
                    $affectedRows += $this->aMentor->save($con);
                }
                $this->setMentor($this->aMentor);
            }

            if ($this->aUserInfo !== null) {
                if ($this->aUserInfo->isModified() || $this->aUserInfo->isNew()) {
                    $affectedRows += $this->aUserInfo->save($con);
                }
                $this->setUserInfo($this->aUserInfo);
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

            if ($this->questionssScheduledForDeletion !== null) {
                if (!$this->questionssScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->questionssScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getCustomerId();
                        $entryPk[1] = $entry->getQuestionId();
                        $pks[] = $entryPk;
                    }

                    \CustomerHasQuestionsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->questionssScheduledForDeletion = null;
                }

            }

            if ($this->collQuestionss) {
                foreach ($this->collQuestionss as $questions) {
                    if (!$questions->isDeleted() && ($questions->isNew() || $questions->isModified())) {
                        $questions->save($con);
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

            if ($this->schedulesScheduledForDeletion !== null) {
                if (!$this->schedulesScheduledForDeletion->isEmpty()) {
                    \ScheduleQuery::create()
                        ->filterByPrimaryKeys($this->schedulesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->schedulesScheduledForDeletion = null;
                }
            }

            if ($this->collSchedules !== null) {
                foreach ($this->collSchedules as $referrerFK) {
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

        $this->modifiedColumns[CustomerTableMap::COL_CUSTOMER_ID] = true;
        if (null !== $this->customer_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CustomerTableMap::COL_CUSTOMER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CustomerTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_MEN)) {
            $modifiedColumns[':p' . $index++]  = 'men';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CAT)) {
            $modifiedColumns[':p' . $index++]  = 'cat';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_USER_INFO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_info_id';
        }

        $sql = sprintf(
            'INSERT INTO customer (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'customer_id':
                        $stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_INT);
                        break;
                    case 'men':
                        $stmt->bindValue($identifier, $this->men, PDO::PARAM_INT);
                        break;
                    case 'cat':
                        $stmt->bindValue($identifier, $this->cat, PDO::PARAM_INT);
                        break;
                    case 'user_info_id':
                        $stmt->bindValue($identifier, $this->user_info_id, PDO::PARAM_INT);
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
        $this->setCustomerId($pk);

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
        $pos = CustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustomerId();
                break;
            case 1:
                return $this->getMen();
                break;
            case 2:
                return $this->getCat();
                break;
            case 3:
                return $this->getUserInfoId();
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

        if (isset($alreadyDumpedObjects['Customer'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Customer'][$this->hashCode()] = true;
        $keys = CustomerTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCustomerId(),
            $keys[1] => $this->getMen(),
            $keys[2] => $this->getCat(),
            $keys[3] => $this->getUserInfoId(),
        );
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
            if (null !== $this->aMentor) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mentor';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'mentor';
                        break;
                    default:
                        $key = 'Mentor';
                }

                $result[$key] = $this->aMentor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserInfo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userInfo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user_info';
                        break;
                    default:
                        $key = 'UserInfo';
                }

                $result[$key] = $this->aUserInfo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collSchedules) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'schedules';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'schedules';
                        break;
                    default:
                        $key = 'Schedules';
                }

                $result[$key] = $this->collSchedules->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Customer
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Customer
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCustomerId($value);
                break;
            case 1:
                $this->setMen($value);
                break;
            case 2:
                $this->setCat($value);
                break;
            case 3:
                $this->setUserInfoId($value);
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
        $keys = CustomerTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCustomerId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMen($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCat($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUserInfoId($arr[$keys[3]]);
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
     * @return $this|\Customer The current object, for fluid interface
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
        $criteria = new Criteria(CustomerTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CustomerTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(CustomerTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_MEN)) {
            $criteria->add(CustomerTableMap::COL_MEN, $this->men);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CAT)) {
            $criteria->add(CustomerTableMap::COL_CAT, $this->cat);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_USER_INFO_ID)) {
            $criteria->add(CustomerTableMap::COL_USER_INFO_ID, $this->user_info_id);
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
        $criteria = ChildCustomerQuery::create();
        $criteria->add(CustomerTableMap::COL_CUSTOMER_ID, $this->customer_id);

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
        $validPk = null !== $this->getCustomerId();

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
        return $this->getCustomerId();
    }

    /**
     * Generic method to set the primary key (customer_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCustomerId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCustomerId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Customer (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMen($this->getMen());
        $copyObj->setCat($this->getCat());
        $copyObj->setUserInfoId($this->getUserInfoId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCustomerHasQuestionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerHasQuestions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSchedules() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchedule($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCustomerId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Customer Clone of current object.
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
     * @return $this|\Customer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategory(ChildCategory $v = null)
    {
        if ($v === null) {
            $this->setCat(NULL);
        } else {
            $this->setCat($v->getCategorieId());
        }

        $this->aCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomer($this);
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
        if ($this->aCategory === null && ($this->cat != 0)) {
            $this->aCategory = ChildCategoryQuery::create()->findPk($this->cat, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategory->addCustomers($this);
             */
        }

        return $this->aCategory;
    }

    /**
     * Declares an association between this object and a ChildMentor object.
     *
     * @param  ChildMentor $v
     * @return $this|\Customer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMentor(ChildMentor $v = null)
    {
        if ($v === null) {
            $this->setMen(NULL);
        } else {
            $this->setMen($v->getMentorId());
        }

        $this->aMentor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMentor object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomer($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMentor object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMentor The associated ChildMentor object.
     * @throws PropelException
     */
    public function getMentor(ConnectionInterface $con = null)
    {
        if ($this->aMentor === null && ($this->men != 0)) {
            $this->aMentor = ChildMentorQuery::create()->findPk($this->men, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMentor->addCustomers($this);
             */
        }

        return $this->aMentor;
    }

    /**
     * Declares an association between this object and a ChildUserInfo object.
     *
     * @param  ChildUserInfo $v
     * @return $this|\Customer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserInfo(ChildUserInfo $v = null)
    {
        if ($v === null) {
            $this->setUserInfoId(NULL);
        } else {
            $this->setUserInfoId($v->getUserId());
        }

        $this->aUserInfo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUserInfo object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomer($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUserInfo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUserInfo The associated ChildUserInfo object.
     * @throws PropelException
     */
    public function getUserInfo(ConnectionInterface $con = null)
    {
        if ($this->aUserInfo === null && ($this->user_info_id != 0)) {
            $this->aUserInfo = ChildUserInfoQuery::create()->findPk($this->user_info_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserInfo->addCustomers($this);
             */
        }

        return $this->aUserInfo;
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
        if ('Schedule' == $relationName) {
            $this->initSchedules();
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
     * If this ChildCustomer is new, it will return
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
                    ->filterByCustomer($this)
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
     * @return $this|ChildCustomer The current object (for fluent API support)
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
            $customerHasQuestionsRemoved->setCustomer(null);
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
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collCustomerHasQuestionss);
    }

    /**
     * Method called to associate a ChildCustomerHasQuestions object to this object
     * through the ChildCustomerHasQuestions foreign key attribute.
     *
     * @param  ChildCustomerHasQuestions $l ChildCustomerHasQuestions
     * @return $this|\Customer The current object (for fluent API support)
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
        $customerHasQuestions->setCustomer($this);
    }

    /**
     * @param  ChildCustomerHasQuestions $customerHasQuestions The ChildCustomerHasQuestions object to remove.
     * @return $this|ChildCustomer The current object (for fluent API support)
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
            $customerHasQuestions->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Customer is new, it will return
     * an empty collection; or if this Customer has previously
     * been saved, it will retrieve related CustomerHasQuestionss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Customer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCustomerHasQuestions[] List of ChildCustomerHasQuestions objects
     */
    public function getCustomerHasQuestionssJoinQuestions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCustomerHasQuestionsQuery::create(null, $criteria);
        $query->joinWith('Questions', $joinBehavior);

        return $this->getCustomerHasQuestionss($query, $con);
    }

    /**
     * Clears out the collSchedules collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSchedules()
     */
    public function clearSchedules()
    {
        $this->collSchedules = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSchedules collection loaded partially.
     */
    public function resetPartialSchedules($v = true)
    {
        $this->collSchedulesPartial = $v;
    }

    /**
     * Initializes the collSchedules collection.
     *
     * By default this just sets the collSchedules collection to an empty array (like clearcollSchedules());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchedules($overrideExisting = true)
    {
        if (null !== $this->collSchedules && !$overrideExisting) {
            return;
        }

        $collectionClassName = ScheduleTableMap::getTableMap()->getCollectionClassName();

        $this->collSchedules = new $collectionClassName;
        $this->collSchedules->setModel('\Schedule');
    }

    /**
     * Gets an array of ChildSchedule objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSchedule[] List of ChildSchedule objects
     * @throws PropelException
     */
    public function getSchedules(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSchedulesPartial && !$this->isNew();
        if (null === $this->collSchedules || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchedules) {
                // return empty collection
                $this->initSchedules();
            } else {
                $collSchedules = ChildScheduleQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSchedulesPartial && count($collSchedules)) {
                        $this->initSchedules(false);

                        foreach ($collSchedules as $obj) {
                            if (false == $this->collSchedules->contains($obj)) {
                                $this->collSchedules->append($obj);
                            }
                        }

                        $this->collSchedulesPartial = true;
                    }

                    return $collSchedules;
                }

                if ($partial && $this->collSchedules) {
                    foreach ($this->collSchedules as $obj) {
                        if ($obj->isNew()) {
                            $collSchedules[] = $obj;
                        }
                    }
                }

                $this->collSchedules = $collSchedules;
                $this->collSchedulesPartial = false;
            }
        }

        return $this->collSchedules;
    }

    /**
     * Sets a collection of ChildSchedule objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $schedules A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCustomer The current object (for fluent API support)
     */
    public function setSchedules(Collection $schedules, ConnectionInterface $con = null)
    {
        /** @var ChildSchedule[] $schedulesToDelete */
        $schedulesToDelete = $this->getSchedules(new Criteria(), $con)->diff($schedules);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->schedulesScheduledForDeletion = clone $schedulesToDelete;

        foreach ($schedulesToDelete as $scheduleRemoved) {
            $scheduleRemoved->setCustomer(null);
        }

        $this->collSchedules = null;
        foreach ($schedules as $schedule) {
            $this->addSchedule($schedule);
        }

        $this->collSchedules = $schedules;
        $this->collSchedulesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Schedule objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Schedule objects.
     * @throws PropelException
     */
    public function countSchedules(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSchedulesPartial && !$this->isNew();
        if (null === $this->collSchedules || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchedules) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSchedules());
            }

            $query = ChildScheduleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collSchedules);
    }

    /**
     * Method called to associate a ChildSchedule object to this object
     * through the ChildSchedule foreign key attribute.
     *
     * @param  ChildSchedule $l ChildSchedule
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function addSchedule(ChildSchedule $l)
    {
        if ($this->collSchedules === null) {
            $this->initSchedules();
            $this->collSchedulesPartial = true;
        }

        if (!$this->collSchedules->contains($l)) {
            $this->doAddSchedule($l);

            if ($this->schedulesScheduledForDeletion and $this->schedulesScheduledForDeletion->contains($l)) {
                $this->schedulesScheduledForDeletion->remove($this->schedulesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildSchedule $schedule The ChildSchedule object to add.
     */
    protected function doAddSchedule(ChildSchedule $schedule)
    {
        $this->collSchedules[]= $schedule;
        $schedule->setCustomer($this);
    }

    /**
     * @param  ChildSchedule $schedule The ChildSchedule object to remove.
     * @return $this|ChildCustomer The current object (for fluent API support)
     */
    public function removeSchedule(ChildSchedule $schedule)
    {
        if ($this->getSchedules()->contains($schedule)) {
            $pos = $this->collSchedules->search($schedule);
            $this->collSchedules->remove($pos);
            if (null === $this->schedulesScheduledForDeletion) {
                $this->schedulesScheduledForDeletion = clone $this->collSchedules;
                $this->schedulesScheduledForDeletion->clear();
            }
            $this->schedulesScheduledForDeletion[]= clone $schedule;
            $schedule->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Customer is new, it will return
     * an empty collection; or if this Customer has previously
     * been saved, it will retrieve related Schedules from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Customer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSchedule[] List of ChildSchedule objects
     */
    public function getSchedulesJoinMentor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildScheduleQuery::create(null, $criteria);
        $query->joinWith('Mentor', $joinBehavior);

        return $this->getSchedules($query, $con);
    }

    /**
     * Clears out the collQuestionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addQuestionss()
     */
    public function clearQuestionss()
    {
        $this->collQuestionss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collQuestionss crossRef collection.
     *
     * By default this just sets the collQuestionss collection to an empty collection (like clearQuestionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initQuestionss()
    {
        $collectionClassName = CustomerHasQuestionsTableMap::getTableMap()->getCollectionClassName();

        $this->collQuestionss = new $collectionClassName;
        $this->collQuestionssPartial = true;
        $this->collQuestionss->setModel('\Questions');
    }

    /**
     * Checks if the collQuestionss collection is loaded.
     *
     * @return bool
     */
    public function isQuestionssLoaded()
    {
        return null !== $this->collQuestionss;
    }

    /**
     * Gets a collection of ChildQuestions objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildQuestions[] List of ChildQuestions objects
     */
    public function getQuestionss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collQuestionssPartial && !$this->isNew();
        if (null === $this->collQuestionss || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collQuestionss) {
                    $this->initQuestionss();
                }
            } else {

                $query = ChildQuestionsQuery::create(null, $criteria)
                    ->filterByCustomer($this);
                $collQuestionss = $query->find($con);
                if (null !== $criteria) {
                    return $collQuestionss;
                }

                if ($partial && $this->collQuestionss) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collQuestionss as $obj) {
                        if (!$collQuestionss->contains($obj)) {
                            $collQuestionss[] = $obj;
                        }
                    }
                }

                $this->collQuestionss = $collQuestionss;
                $this->collQuestionssPartial = false;
            }
        }

        return $this->collQuestionss;
    }

    /**
     * Sets a collection of Questions objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $questionss A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildCustomer The current object (for fluent API support)
     */
    public function setQuestionss(Collection $questionss, ConnectionInterface $con = null)
    {
        $this->clearQuestionss();
        $currentQuestionss = $this->getQuestionss();

        $questionssScheduledForDeletion = $currentQuestionss->diff($questionss);

        foreach ($questionssScheduledForDeletion as $toDelete) {
            $this->removeQuestions($toDelete);
        }

        foreach ($questionss as $questions) {
            if (!$currentQuestionss->contains($questions)) {
                $this->doAddQuestions($questions);
            }
        }

        $this->collQuestionssPartial = false;
        $this->collQuestionss = $questionss;

        return $this;
    }

    /**
     * Gets the number of Questions objects related by a many-to-many relationship
     * to the current object by way of the customer_has_questions cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related Questions objects
     */
    public function countQuestionss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collQuestionssPartial && !$this->isNew();
        if (null === $this->collQuestionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuestionss) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getQuestionss());
                }

                $query = ChildQuestionsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCustomer($this)
                    ->count($con);
            }
        } else {
            return count($this->collQuestionss);
        }
    }

    /**
     * Associate a ChildQuestions to this object
     * through the customer_has_questions cross reference table.
     *
     * @param ChildQuestions $questions
     * @return ChildCustomer The current object (for fluent API support)
     */
    public function addQuestions(ChildQuestions $questions)
    {
        if ($this->collQuestionss === null) {
            $this->initQuestionss();
        }

        if (!$this->getQuestionss()->contains($questions)) {
            // only add it if the **same** object is not already associated
            $this->collQuestionss->push($questions);
            $this->doAddQuestions($questions);
        }

        return $this;
    }

    /**
     *
     * @param ChildQuestions $questions
     */
    protected function doAddQuestions(ChildQuestions $questions)
    {
        $customerHasQuestions = new ChildCustomerHasQuestions();

        $customerHasQuestions->setQuestions($questions);

        $customerHasQuestions->setCustomer($this);

        $this->addCustomerHasQuestions($customerHasQuestions);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$questions->isCustomersLoaded()) {
            $questions->initCustomers();
            $questions->getCustomers()->push($this);
        } elseif (!$questions->getCustomers()->contains($this)) {
            $questions->getCustomers()->push($this);
        }

    }

    /**
     * Remove questions of this object
     * through the customer_has_questions cross reference table.
     *
     * @param ChildQuestions $questions
     * @return ChildCustomer The current object (for fluent API support)
     */
    public function removeQuestions(ChildQuestions $questions)
    {
        if ($this->getQuestionss()->contains($questions)) {
            $customerHasQuestions = new ChildCustomerHasQuestions();
            $customerHasQuestions->setQuestions($questions);
            if ($questions->isCustomersLoaded()) {
                //remove the back reference if available
                $questions->getCustomers()->removeObject($this);
            }

            $customerHasQuestions->setCustomer($this);
            $this->removeCustomerHasQuestions(clone $customerHasQuestions);
            $customerHasQuestions->clear();

            $this->collQuestionss->remove($this->collQuestionss->search($questions));

            if (null === $this->questionssScheduledForDeletion) {
                $this->questionssScheduledForDeletion = clone $this->collQuestionss;
                $this->questionssScheduledForDeletion->clear();
            }

            $this->questionssScheduledForDeletion->push($questions);
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
            $this->aCategory->removeCustomer($this);
        }
        if (null !== $this->aMentor) {
            $this->aMentor->removeCustomer($this);
        }
        if (null !== $this->aUserInfo) {
            $this->aUserInfo->removeCustomer($this);
        }
        $this->customer_id = null;
        $this->men = null;
        $this->cat = null;
        $this->user_info_id = null;
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
            if ($this->collSchedules) {
                foreach ($this->collSchedules as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collQuestionss) {
                foreach ($this->collQuestionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCustomerHasQuestionss = null;
        $this->collSchedules = null;
        $this->collQuestionss = null;
        $this->aCategory = null;
        $this->aMentor = null;
        $this->aUserInfo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CustomerTableMap::DEFAULT_STRING_FORMAT);
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
