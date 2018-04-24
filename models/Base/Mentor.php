<?php

namespace Base;

use \Category as ChildCategory;
use \CategoryQuery as ChildCategoryQuery;
use \Customer as ChildCustomer;
use \CustomerQuery as ChildCustomerQuery;
use \Mentor as ChildMentor;
use \MentorQuery as ChildMentorQuery;
use \Schedule as ChildSchedule;
use \ScheduleQuery as ChildScheduleQuery;
use \UserInfo as ChildUserInfo;
use \UserInfoQuery as ChildUserInfoQuery;
use \Exception;
use \PDO;
use Map\CustomerTableMap;
use Map\MentorTableMap;
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
 * Base class that represents a row from the 'mentor' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Mentor implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MentorTableMap';


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
     * The value for the mentor_id field.
     *
     * @var        int
     */
    protected $mentor_id;

    /**
     * The value for the categorie field.
     *
     * @var        int
     */
    protected $categorie;

    /**
     * The value for the info field.
     *
     * @var        int
     */
    protected $info;

    /**
     * @var        ChildCategory
     */
    protected $aCategory;

    /**
     * @var        ChildUserInfo
     */
    protected $aUserInfo;

    /**
     * @var        ObjectCollection|ChildCustomer[] Collection to store aggregation of ChildCustomer objects.
     */
    protected $collCustomers;
    protected $collCustomersPartial;

    /**
     * @var        ObjectCollection|ChildSchedule[] Collection to store aggregation of ChildSchedule objects.
     */
    protected $collSchedules;
    protected $collSchedulesPartial;

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
     * @var ObjectCollection|ChildSchedule[]
     */
    protected $schedulesScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Mentor object.
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
     * Compares this with another <code>Mentor</code> instance.  If
     * <code>obj</code> is an instance of <code>Mentor</code>, delegates to
     * <code>equals(Mentor)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Mentor The current object, for fluid interface
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
     * Get the [mentor_id] column value.
     *
     * @return int
     */
    public function getMentorId()
    {
        return $this->mentor_id;
    }

    /**
     * Get the [categorie] column value.
     *
     * @return int
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Get the [info] column value.
     *
     * @return int
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of [mentor_id] column.
     *
     * @param int $v new value
     * @return $this|\Mentor The current object (for fluent API support)
     */
    public function setMentorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->mentor_id !== $v) {
            $this->mentor_id = $v;
            $this->modifiedColumns[MentorTableMap::COL_MENTOR_ID] = true;
        }

        return $this;
    } // setMentorId()

    /**
     * Set the value of [categorie] column.
     *
     * @param int $v new value
     * @return $this|\Mentor The current object (for fluent API support)
     */
    public function setCategorie($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->categorie !== $v) {
            $this->categorie = $v;
            $this->modifiedColumns[MentorTableMap::COL_CATEGORIE] = true;
        }

        if ($this->aCategory !== null && $this->aCategory->getCategorieId() !== $v) {
            $this->aCategory = null;
        }

        return $this;
    } // setCategorie()

    /**
     * Set the value of [info] column.
     *
     * @param int $v new value
     * @return $this|\Mentor The current object (for fluent API support)
     */
    public function setInfo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->info !== $v) {
            $this->info = $v;
            $this->modifiedColumns[MentorTableMap::COL_INFO] = true;
        }

        if ($this->aUserInfo !== null && $this->aUserInfo->getUserId() !== $v) {
            $this->aUserInfo = null;
        }

        return $this;
    } // setInfo()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MentorTableMap::translateFieldName('MentorId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mentor_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MentorTableMap::translateFieldName('Categorie', TableMap::TYPE_PHPNAME, $indexType)];
            $this->categorie = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MentorTableMap::translateFieldName('Info', TableMap::TYPE_PHPNAME, $indexType)];
            $this->info = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = MentorTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Mentor'), 0, $e);
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
        if ($this->aCategory !== null && $this->categorie !== $this->aCategory->getCategorieId()) {
            $this->aCategory = null;
        }
        if ($this->aUserInfo !== null && $this->info !== $this->aUserInfo->getUserId()) {
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
            $con = Propel::getServiceContainer()->getReadConnection(MentorTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMentorQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategory = null;
            $this->aUserInfo = null;
            $this->collCustomers = null;

            $this->collSchedules = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Mentor::setDeleted()
     * @see Mentor::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMentorQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MentorTableMap::DATABASE_NAME);
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
                MentorTableMap::addInstanceToPool($this);
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

            if ($this->customersScheduledForDeletion !== null) {
                if (!$this->customersScheduledForDeletion->isEmpty()) {
                    foreach ($this->customersScheduledForDeletion as $customer) {
                        // need to save related object because we set the relation to null
                        $customer->save($con);
                    }
                    $this->customersScheduledForDeletion = null;
                }
            }

            if ($this->collCustomers !== null) {
                foreach ($this->collCustomers as $referrerFK) {
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

        $this->modifiedColumns[MentorTableMap::COL_MENTOR_ID] = true;
        if (null !== $this->mentor_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MentorTableMap::COL_MENTOR_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MentorTableMap::COL_MENTOR_ID)) {
            $modifiedColumns[':p' . $index++]  = 'mentor_id';
        }
        if ($this->isColumnModified(MentorTableMap::COL_CATEGORIE)) {
            $modifiedColumns[':p' . $index++]  = 'categorie';
        }
        if ($this->isColumnModified(MentorTableMap::COL_INFO)) {
            $modifiedColumns[':p' . $index++]  = 'info';
        }

        $sql = sprintf(
            'INSERT INTO mentor (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'mentor_id':
                        $stmt->bindValue($identifier, $this->mentor_id, PDO::PARAM_INT);
                        break;
                    case 'categorie':
                        $stmt->bindValue($identifier, $this->categorie, PDO::PARAM_INT);
                        break;
                    case 'info':
                        $stmt->bindValue($identifier, $this->info, PDO::PARAM_INT);
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
        $this->setMentorId($pk);

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
        $pos = MentorTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getMentorId();
                break;
            case 1:
                return $this->getCategorie();
                break;
            case 2:
                return $this->getInfo();
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

        if (isset($alreadyDumpedObjects['Mentor'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Mentor'][$this->hashCode()] = true;
        $keys = MentorTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMentorId(),
            $keys[1] => $this->getCategorie(),
            $keys[2] => $this->getInfo(),
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
            if (null !== $this->collCustomers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'customers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'customers';
                        break;
                    default:
                        $key = 'Customers';
                }

                $result[$key] = $this->collCustomers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Mentor
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MentorTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Mentor
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setMentorId($value);
                break;
            case 1:
                $this->setCategorie($value);
                break;
            case 2:
                $this->setInfo($value);
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
        $keys = MentorTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setMentorId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCategorie($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setInfo($arr[$keys[2]]);
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
     * @return $this|\Mentor The current object, for fluid interface
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
        $criteria = new Criteria(MentorTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MentorTableMap::COL_MENTOR_ID)) {
            $criteria->add(MentorTableMap::COL_MENTOR_ID, $this->mentor_id);
        }
        if ($this->isColumnModified(MentorTableMap::COL_CATEGORIE)) {
            $criteria->add(MentorTableMap::COL_CATEGORIE, $this->categorie);
        }
        if ($this->isColumnModified(MentorTableMap::COL_INFO)) {
            $criteria->add(MentorTableMap::COL_INFO, $this->info);
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
        $criteria = ChildMentorQuery::create();
        $criteria->add(MentorTableMap::COL_MENTOR_ID, $this->mentor_id);

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
        $validPk = null !== $this->getMentorId();

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
        return $this->getMentorId();
    }

    /**
     * Generic method to set the primary key (mentor_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setMentorId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getMentorId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Mentor (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCategorie($this->getCategorie());
        $copyObj->setInfo($this->getInfo());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCustomers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomer($relObj->copy($deepCopy));
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
            $copyObj->setMentorId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Mentor Clone of current object.
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
     * @return $this|\Mentor The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategory(ChildCategory $v = null)
    {
        if ($v === null) {
            $this->setCategorie(NULL);
        } else {
            $this->setCategorie($v->getCategorieId());
        }

        $this->aCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addMentor($this);
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
        if ($this->aCategory === null && ($this->categorie != 0)) {
            $this->aCategory = ChildCategoryQuery::create()->findPk($this->categorie, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategory->addMentors($this);
             */
        }

        return $this->aCategory;
    }

    /**
     * Declares an association between this object and a ChildUserInfo object.
     *
     * @param  ChildUserInfo $v
     * @return $this|\Mentor The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserInfo(ChildUserInfo $v = null)
    {
        if ($v === null) {
            $this->setInfo(NULL);
        } else {
            $this->setInfo($v->getUserId());
        }

        $this->aUserInfo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUserInfo object, it will not be re-added.
        if ($v !== null) {
            $v->addMentor($this);
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
        if ($this->aUserInfo === null && ($this->info != 0)) {
            $this->aUserInfo = ChildUserInfoQuery::create()->findPk($this->info, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserInfo->addMentors($this);
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
        if ('Customer' == $relationName) {
            $this->initCustomers();
            return;
        }
        if ('Schedule' == $relationName) {
            $this->initSchedules();
            return;
        }
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
     * Reset is the collCustomers collection loaded partially.
     */
    public function resetPartialCustomers($v = true)
    {
        $this->collCustomersPartial = $v;
    }

    /**
     * Initializes the collCustomers collection.
     *
     * By default this just sets the collCustomers collection to an empty array (like clearcollCustomers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomers($overrideExisting = true)
    {
        if (null !== $this->collCustomers && !$overrideExisting) {
            return;
        }

        $collectionClassName = CustomerTableMap::getTableMap()->getCollectionClassName();

        $this->collCustomers = new $collectionClassName;
        $this->collCustomers->setModel('\Customer');
    }

    /**
     * Gets an array of ChildCustomer objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMentor is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCustomer[] List of ChildCustomer objects
     * @throws PropelException
     */
    public function getCustomers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomers) {
                // return empty collection
                $this->initCustomers();
            } else {
                $collCustomers = ChildCustomerQuery::create(null, $criteria)
                    ->filterByMentor($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCustomersPartial && count($collCustomers)) {
                        $this->initCustomers(false);

                        foreach ($collCustomers as $obj) {
                            if (false == $this->collCustomers->contains($obj)) {
                                $this->collCustomers->append($obj);
                            }
                        }

                        $this->collCustomersPartial = true;
                    }

                    return $collCustomers;
                }

                if ($partial && $this->collCustomers) {
                    foreach ($this->collCustomers as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildCustomer objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $customers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMentor The current object (for fluent API support)
     */
    public function setCustomers(Collection $customers, ConnectionInterface $con = null)
    {
        /** @var ChildCustomer[] $customersToDelete */
        $customersToDelete = $this->getCustomers(new Criteria(), $con)->diff($customers);


        $this->customersScheduledForDeletion = $customersToDelete;

        foreach ($customersToDelete as $customerRemoved) {
            $customerRemoved->setMentor(null);
        }

        $this->collCustomers = null;
        foreach ($customers as $customer) {
            $this->addCustomer($customer);
        }

        $this->collCustomers = $customers;
        $this->collCustomersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Customer objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Customer objects.
     * @throws PropelException
     */
    public function countCustomers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomers());
            }

            $query = ChildCustomerQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMentor($this)
                ->count($con);
        }

        return count($this->collCustomers);
    }

    /**
     * Method called to associate a ChildCustomer object to this object
     * through the ChildCustomer foreign key attribute.
     *
     * @param  ChildCustomer $l ChildCustomer
     * @return $this|\Mentor The current object (for fluent API support)
     */
    public function addCustomer(ChildCustomer $l)
    {
        if ($this->collCustomers === null) {
            $this->initCustomers();
            $this->collCustomersPartial = true;
        }

        if (!$this->collCustomers->contains($l)) {
            $this->doAddCustomer($l);

            if ($this->customersScheduledForDeletion and $this->customersScheduledForDeletion->contains($l)) {
                $this->customersScheduledForDeletion->remove($this->customersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCustomer $customer The ChildCustomer object to add.
     */
    protected function doAddCustomer(ChildCustomer $customer)
    {
        $this->collCustomers[]= $customer;
        $customer->setMentor($this);
    }

    /**
     * @param  ChildCustomer $customer The ChildCustomer object to remove.
     * @return $this|ChildMentor The current object (for fluent API support)
     */
    public function removeCustomer(ChildCustomer $customer)
    {
        if ($this->getCustomers()->contains($customer)) {
            $pos = $this->collCustomers->search($customer);
            $this->collCustomers->remove($pos);
            if (null === $this->customersScheduledForDeletion) {
                $this->customersScheduledForDeletion = clone $this->collCustomers;
                $this->customersScheduledForDeletion->clear();
            }
            $this->customersScheduledForDeletion[]= $customer;
            $customer->setMentor(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mentor is new, it will return
     * an empty collection; or if this Mentor has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mentor.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCustomer[] List of ChildCustomer objects
     */
    public function getCustomersJoinCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCustomerQuery::create(null, $criteria);
        $query->joinWith('Category', $joinBehavior);

        return $this->getCustomers($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mentor is new, it will return
     * an empty collection; or if this Mentor has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mentor.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCustomer[] List of ChildCustomer objects
     */
    public function getCustomersJoinUserInfo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCustomerQuery::create(null, $criteria);
        $query->joinWith('UserInfo', $joinBehavior);

        return $this->getCustomers($query, $con);
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
     * If this ChildMentor is new, it will return
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
                    ->filterByMentor($this)
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
     * @return $this|ChildMentor The current object (for fluent API support)
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
            $scheduleRemoved->setMentor(null);
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
                ->filterByMentor($this)
                ->count($con);
        }

        return count($this->collSchedules);
    }

    /**
     * Method called to associate a ChildSchedule object to this object
     * through the ChildSchedule foreign key attribute.
     *
     * @param  ChildSchedule $l ChildSchedule
     * @return $this|\Mentor The current object (for fluent API support)
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
        $schedule->setMentor($this);
    }

    /**
     * @param  ChildSchedule $schedule The ChildSchedule object to remove.
     * @return $this|ChildMentor The current object (for fluent API support)
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
            $schedule->setMentor(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mentor is new, it will return
     * an empty collection; or if this Mentor has previously
     * been saved, it will retrieve related Schedules from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mentor.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSchedule[] List of ChildSchedule objects
     */
    public function getSchedulesJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildScheduleQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getSchedules($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCategory) {
            $this->aCategory->removeMentor($this);
        }
        if (null !== $this->aUserInfo) {
            $this->aUserInfo->removeMentor($this);
        }
        $this->mentor_id = null;
        $this->categorie = null;
        $this->info = null;
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
            if ($this->collCustomers) {
                foreach ($this->collCustomers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSchedules) {
                foreach ($this->collSchedules as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCustomers = null;
        $this->collSchedules = null;
        $this->aCategory = null;
        $this->aUserInfo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MentorTableMap::DEFAULT_STRING_FORMAT);
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
