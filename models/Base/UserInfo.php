<?php

namespace Base;

use \Administrator as ChildAdministrator;
use \AdministratorQuery as ChildAdministratorQuery;
use \Customer as ChildCustomer;
use \CustomerQuery as ChildCustomerQuery;
use \Mentor as ChildMentor;
use \MentorQuery as ChildMentorQuery;
use \UserInfo as ChildUserInfo;
use \UserInfoQuery as ChildUserInfoQuery;
use \Exception;
use \PDO;
use Map\AdministratorTableMap;
use Map\CustomerTableMap;
use Map\MentorTableMap;
use Map\UserInfoTableMap;
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
 * Base class that represents a row from the 'user_info' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class UserInfo implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UserInfoTableMap';


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
     * The value for the first_name field.
     *
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     *
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the phonenum field.
     *
     * @var        string
     */
    protected $phonenum;

    /**
     * The value for the address field.
     *
     * @var        string
     */
    protected $address;

    /**
     * The value for the state field.
     *
     * @var        string
     */
    protected $state;

    /**
     * The value for the city field.
     *
     * @var        string
     */
    protected $city;

    /**
     * The value for the zipcode field.
     *
     * @var        string
     */
    protected $zipcode;

    /**
     * The value for the user_id field.
     *
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the username field.
     *
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * @var        ObjectCollection|ChildAdministrator[] Collection to store aggregation of ChildAdministrator objects.
     */
    protected $collAdministrators;
    protected $collAdministratorsPartial;

    /**
     * @var        ObjectCollection|ChildCustomer[] Collection to store aggregation of ChildCustomer objects.
     */
    protected $collCustomers;
    protected $collCustomersPartial;

    /**
     * @var        ObjectCollection|ChildMentor[] Collection to store aggregation of ChildMentor objects.
     */
    protected $collMentors;
    protected $collMentorsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAdministrator[]
     */
    protected $administratorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCustomer[]
     */
    protected $customersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMentor[]
     */
    protected $mentorsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\UserInfo object.
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
     * Compares this with another <code>UserInfo</code> instance.  If
     * <code>obj</code> is an instance of <code>UserInfo</code>, delegates to
     * <code>equals(UserInfo)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|UserInfo The current object, for fluid interface
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
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [phonenum] column value.
     *
     * @return string
     */
    public function getPhonenum()
    {
        return $this->phonenum;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [state] column value.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [zipcode] column value.
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [phonenum] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setPhonenum($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phonenum !== $v) {
            $this->phonenum = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_PHONENUM] = true;
        }

        return $this;
    } // setPhonenum()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_ADDRESS] = true;
        }

        return $this;
    } // setAddress()

    /**
     * Set the value of [state] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_STATE] = true;
        }

        return $this;
    } // setState()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [zipcode] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zipcode !== $v) {
            $this->zipcode = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_ZIPCODE] = true;
        }

        return $this;
    } // setZipcode()

    /**
     * Set the value of [user_id] column.
     *
     * @param int $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[UserInfoTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserInfoTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserInfoTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserInfoTableMap::translateFieldName('Phonenum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phonenum = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserInfoTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserInfoTableMap::translateFieldName('State', TableMap::TYPE_PHPNAME, $indexType)];
            $this->state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UserInfoTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UserInfoTableMap::translateFieldName('Zipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UserInfoTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UserInfoTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : UserInfoTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : UserInfoTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = UserInfoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\UserInfo'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(UserInfoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserInfoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAdministrators = null;

            $this->collCustomers = null;

            $this->collMentors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see UserInfo::setDeleted()
     * @see UserInfo::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserInfoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserInfoTableMap::DATABASE_NAME);
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
                UserInfoTableMap::addInstanceToPool($this);
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

            if ($this->administratorsScheduledForDeletion !== null) {
                if (!$this->administratorsScheduledForDeletion->isEmpty()) {
                    \AdministratorQuery::create()
                        ->filterByPrimaryKeys($this->administratorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->administratorsScheduledForDeletion = null;
                }
            }

            if ($this->collAdministrators !== null) {
                foreach ($this->collAdministrators as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->customersScheduledForDeletion !== null) {
                if (!$this->customersScheduledForDeletion->isEmpty()) {
                    \CustomerQuery::create()
                        ->filterByPrimaryKeys($this->customersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->mentorsScheduledForDeletion !== null) {
                if (!$this->mentorsScheduledForDeletion->isEmpty()) {
                    \MentorQuery::create()
                        ->filterByPrimaryKeys($this->mentorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mentorsScheduledForDeletion = null;
                }
            }

            if ($this->collMentors !== null) {
                foreach ($this->collMentors as $referrerFK) {
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

        $this->modifiedColumns[UserInfoTableMap::COL_USER_ID] = true;
        if (null !== $this->user_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserInfoTableMap::COL_USER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserInfoTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_PHONENUM)) {
            $modifiedColumns[':p' . $index++]  = 'phonenum';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'state';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'zipcode';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'username';
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }

        $sql = sprintf(
            'INSERT INTO user_info (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'phonenum':
                        $stmt->bindValue($identifier, $this->phonenum, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'state':
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'zipcode':
                        $stmt->bindValue($identifier, $this->zipcode, PDO::PARAM_STR);
                        break;
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'username':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
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
        $this->setUserId($pk);

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
        $pos = UserInfoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFirstName();
                break;
            case 1:
                return $this->getLastName();
                break;
            case 2:
                return $this->getPhonenum();
                break;
            case 3:
                return $this->getAddress();
                break;
            case 4:
                return $this->getState();
                break;
            case 5:
                return $this->getCity();
                break;
            case 6:
                return $this->getZipcode();
                break;
            case 7:
                return $this->getUserId();
                break;
            case 8:
                return $this->getEmail();
                break;
            case 9:
                return $this->getUsername();
                break;
            case 10:
                return $this->getPassword();
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

        if (isset($alreadyDumpedObjects['UserInfo'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UserInfo'][$this->hashCode()] = true;
        $keys = UserInfoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFirstName(),
            $keys[1] => $this->getLastName(),
            $keys[2] => $this->getPhonenum(),
            $keys[3] => $this->getAddress(),
            $keys[4] => $this->getState(),
            $keys[5] => $this->getCity(),
            $keys[6] => $this->getZipcode(),
            $keys[7] => $this->getUserId(),
            $keys[8] => $this->getEmail(),
            $keys[9] => $this->getUsername(),
            $keys[10] => $this->getPassword(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAdministrators) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'administrators';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'administrators';
                        break;
                    default:
                        $key = 'Administrators';
                }

                $result[$key] = $this->collAdministrators->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collMentors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mentors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'mentors';
                        break;
                    default:
                        $key = 'Mentors';
                }

                $result[$key] = $this->collMentors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\UserInfo
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserInfoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\UserInfo
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFirstName($value);
                break;
            case 1:
                $this->setLastName($value);
                break;
            case 2:
                $this->setPhonenum($value);
                break;
            case 3:
                $this->setAddress($value);
                break;
            case 4:
                $this->setState($value);
                break;
            case 5:
                $this->setCity($value);
                break;
            case 6:
                $this->setZipcode($value);
                break;
            case 7:
                $this->setUserId($value);
                break;
            case 8:
                $this->setEmail($value);
                break;
            case 9:
                $this->setUsername($value);
                break;
            case 10:
                $this->setPassword($value);
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
        $keys = UserInfoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFirstName($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLastName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPhonenum($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAddress($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setState($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCity($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setZipcode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUserId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEmail($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUsername($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPassword($arr[$keys[10]]);
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
     * @return $this|\UserInfo The current object, for fluid interface
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
        $criteria = new Criteria(UserInfoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserInfoTableMap::COL_FIRST_NAME)) {
            $criteria->add(UserInfoTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_LAST_NAME)) {
            $criteria->add(UserInfoTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_PHONENUM)) {
            $criteria->add(UserInfoTableMap::COL_PHONENUM, $this->phonenum);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_ADDRESS)) {
            $criteria->add(UserInfoTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_STATE)) {
            $criteria->add(UserInfoTableMap::COL_STATE, $this->state);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_CITY)) {
            $criteria->add(UserInfoTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_ZIPCODE)) {
            $criteria->add(UserInfoTableMap::COL_ZIPCODE, $this->zipcode);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_USER_ID)) {
            $criteria->add(UserInfoTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_EMAIL)) {
            $criteria->add(UserInfoTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_USERNAME)) {
            $criteria->add(UserInfoTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(UserInfoTableMap::COL_PASSWORD)) {
            $criteria->add(UserInfoTableMap::COL_PASSWORD, $this->password);
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
        $criteria = ChildUserInfoQuery::create();
        $criteria->add(UserInfoTableMap::COL_USER_ID, $this->user_id);

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
        $validPk = null !== $this->getUserId();

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
        return $this->getUserId();
    }

    /**
     * Generic method to set the primary key (user_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUserId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getUserId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \UserInfo (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setPhonenum($this->getPhonenum());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setState($this->getState());
        $copyObj->setCity($this->getCity());
        $copyObj->setZipcode($this->getZipcode());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAdministrators() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAdministrator($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCustomers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomer($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMentors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMentor($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUserId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \UserInfo Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Administrator' == $relationName) {
            $this->initAdministrators();
            return;
        }
        if ('Customer' == $relationName) {
            $this->initCustomers();
            return;
        }
        if ('Mentor' == $relationName) {
            $this->initMentors();
            return;
        }
    }

    /**
     * Clears out the collAdministrators collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAdministrators()
     */
    public function clearAdministrators()
    {
        $this->collAdministrators = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAdministrators collection loaded partially.
     */
    public function resetPartialAdministrators($v = true)
    {
        $this->collAdministratorsPartial = $v;
    }

    /**
     * Initializes the collAdministrators collection.
     *
     * By default this just sets the collAdministrators collection to an empty array (like clearcollAdministrators());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAdministrators($overrideExisting = true)
    {
        if (null !== $this->collAdministrators && !$overrideExisting) {
            return;
        }

        $collectionClassName = AdministratorTableMap::getTableMap()->getCollectionClassName();

        $this->collAdministrators = new $collectionClassName;
        $this->collAdministrators->setModel('\Administrator');
    }

    /**
     * Gets an array of ChildAdministrator objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUserInfo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAdministrator[] List of ChildAdministrator objects
     * @throws PropelException
     */
    public function getAdministrators(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAdministratorsPartial && !$this->isNew();
        if (null === $this->collAdministrators || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAdministrators) {
                // return empty collection
                $this->initAdministrators();
            } else {
                $collAdministrators = ChildAdministratorQuery::create(null, $criteria)
                    ->filterByUserInfo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAdministratorsPartial && count($collAdministrators)) {
                        $this->initAdministrators(false);

                        foreach ($collAdministrators as $obj) {
                            if (false == $this->collAdministrators->contains($obj)) {
                                $this->collAdministrators->append($obj);
                            }
                        }

                        $this->collAdministratorsPartial = true;
                    }

                    return $collAdministrators;
                }

                if ($partial && $this->collAdministrators) {
                    foreach ($this->collAdministrators as $obj) {
                        if ($obj->isNew()) {
                            $collAdministrators[] = $obj;
                        }
                    }
                }

                $this->collAdministrators = $collAdministrators;
                $this->collAdministratorsPartial = false;
            }
        }

        return $this->collAdministrators;
    }

    /**
     * Sets a collection of ChildAdministrator objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $administrators A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUserInfo The current object (for fluent API support)
     */
    public function setAdministrators(Collection $administrators, ConnectionInterface $con = null)
    {
        /** @var ChildAdministrator[] $administratorsToDelete */
        $administratorsToDelete = $this->getAdministrators(new Criteria(), $con)->diff($administrators);


        $this->administratorsScheduledForDeletion = $administratorsToDelete;

        foreach ($administratorsToDelete as $administratorRemoved) {
            $administratorRemoved->setUserInfo(null);
        }

        $this->collAdministrators = null;
        foreach ($administrators as $administrator) {
            $this->addAdministrator($administrator);
        }

        $this->collAdministrators = $administrators;
        $this->collAdministratorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Administrator objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Administrator objects.
     * @throws PropelException
     */
    public function countAdministrators(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAdministratorsPartial && !$this->isNew();
        if (null === $this->collAdministrators || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAdministrators) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAdministrators());
            }

            $query = ChildAdministratorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserInfo($this)
                ->count($con);
        }

        return count($this->collAdministrators);
    }

    /**
     * Method called to associate a ChildAdministrator object to this object
     * through the ChildAdministrator foreign key attribute.
     *
     * @param  ChildAdministrator $l ChildAdministrator
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function addAdministrator(ChildAdministrator $l)
    {
        if ($this->collAdministrators === null) {
            $this->initAdministrators();
            $this->collAdministratorsPartial = true;
        }

        if (!$this->collAdministrators->contains($l)) {
            $this->doAddAdministrator($l);

            if ($this->administratorsScheduledForDeletion and $this->administratorsScheduledForDeletion->contains($l)) {
                $this->administratorsScheduledForDeletion->remove($this->administratorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAdministrator $administrator The ChildAdministrator object to add.
     */
    protected function doAddAdministrator(ChildAdministrator $administrator)
    {
        $this->collAdministrators[]= $administrator;
        $administrator->setUserInfo($this);
    }

    /**
     * @param  ChildAdministrator $administrator The ChildAdministrator object to remove.
     * @return $this|ChildUserInfo The current object (for fluent API support)
     */
    public function removeAdministrator(ChildAdministrator $administrator)
    {
        if ($this->getAdministrators()->contains($administrator)) {
            $pos = $this->collAdministrators->search($administrator);
            $this->collAdministrators->remove($pos);
            if (null === $this->administratorsScheduledForDeletion) {
                $this->administratorsScheduledForDeletion = clone $this->collAdministrators;
                $this->administratorsScheduledForDeletion->clear();
            }
            $this->administratorsScheduledForDeletion[]= clone $administrator;
            $administrator->setUserInfo(null);
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
     * If this ChildUserInfo is new, it will return
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
                    ->filterByUserInfo($this)
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
     * @return $this|ChildUserInfo The current object (for fluent API support)
     */
    public function setCustomers(Collection $customers, ConnectionInterface $con = null)
    {
        /** @var ChildCustomer[] $customersToDelete */
        $customersToDelete = $this->getCustomers(new Criteria(), $con)->diff($customers);


        $this->customersScheduledForDeletion = $customersToDelete;

        foreach ($customersToDelete as $customerRemoved) {
            $customerRemoved->setUserInfo(null);
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
                ->filterByUserInfo($this)
                ->count($con);
        }

        return count($this->collCustomers);
    }

    /**
     * Method called to associate a ChildCustomer object to this object
     * through the ChildCustomer foreign key attribute.
     *
     * @param  ChildCustomer $l ChildCustomer
     * @return $this|\UserInfo The current object (for fluent API support)
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
        $customer->setUserInfo($this);
    }

    /**
     * @param  ChildCustomer $customer The ChildCustomer object to remove.
     * @return $this|ChildUserInfo The current object (for fluent API support)
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
            $this->customersScheduledForDeletion[]= clone $customer;
            $customer->setUserInfo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserInfo is new, it will return
     * an empty collection; or if this UserInfo has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserInfo.
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
     * Otherwise if this UserInfo is new, it will return
     * an empty collection; or if this UserInfo has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserInfo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCustomer[] List of ChildCustomer objects
     */
    public function getCustomersJoinMentor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCustomerQuery::create(null, $criteria);
        $query->joinWith('Mentor', $joinBehavior);

        return $this->getCustomers($query, $con);
    }

    /**
     * Clears out the collMentors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMentors()
     */
    public function clearMentors()
    {
        $this->collMentors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMentors collection loaded partially.
     */
    public function resetPartialMentors($v = true)
    {
        $this->collMentorsPartial = $v;
    }

    /**
     * Initializes the collMentors collection.
     *
     * By default this just sets the collMentors collection to an empty array (like clearcollMentors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMentors($overrideExisting = true)
    {
        if (null !== $this->collMentors && !$overrideExisting) {
            return;
        }

        $collectionClassName = MentorTableMap::getTableMap()->getCollectionClassName();

        $this->collMentors = new $collectionClassName;
        $this->collMentors->setModel('\Mentor');
    }

    /**
     * Gets an array of ChildMentor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUserInfo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMentor[] List of ChildMentor objects
     * @throws PropelException
     */
    public function getMentors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMentorsPartial && !$this->isNew();
        if (null === $this->collMentors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMentors) {
                // return empty collection
                $this->initMentors();
            } else {
                $collMentors = ChildMentorQuery::create(null, $criteria)
                    ->filterByUserInfo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMentorsPartial && count($collMentors)) {
                        $this->initMentors(false);

                        foreach ($collMentors as $obj) {
                            if (false == $this->collMentors->contains($obj)) {
                                $this->collMentors->append($obj);
                            }
                        }

                        $this->collMentorsPartial = true;
                    }

                    return $collMentors;
                }

                if ($partial && $this->collMentors) {
                    foreach ($this->collMentors as $obj) {
                        if ($obj->isNew()) {
                            $collMentors[] = $obj;
                        }
                    }
                }

                $this->collMentors = $collMentors;
                $this->collMentorsPartial = false;
            }
        }

        return $this->collMentors;
    }

    /**
     * Sets a collection of ChildMentor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $mentors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUserInfo The current object (for fluent API support)
     */
    public function setMentors(Collection $mentors, ConnectionInterface $con = null)
    {
        /** @var ChildMentor[] $mentorsToDelete */
        $mentorsToDelete = $this->getMentors(new Criteria(), $con)->diff($mentors);


        $this->mentorsScheduledForDeletion = $mentorsToDelete;

        foreach ($mentorsToDelete as $mentorRemoved) {
            $mentorRemoved->setUserInfo(null);
        }

        $this->collMentors = null;
        foreach ($mentors as $mentor) {
            $this->addMentor($mentor);
        }

        $this->collMentors = $mentors;
        $this->collMentorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mentor objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Mentor objects.
     * @throws PropelException
     */
    public function countMentors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMentorsPartial && !$this->isNew();
        if (null === $this->collMentors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMentors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMentors());
            }

            $query = ChildMentorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserInfo($this)
                ->count($con);
        }

        return count($this->collMentors);
    }

    /**
     * Method called to associate a ChildMentor object to this object
     * through the ChildMentor foreign key attribute.
     *
     * @param  ChildMentor $l ChildMentor
     * @return $this|\UserInfo The current object (for fluent API support)
     */
    public function addMentor(ChildMentor $l)
    {
        if ($this->collMentors === null) {
            $this->initMentors();
            $this->collMentorsPartial = true;
        }

        if (!$this->collMentors->contains($l)) {
            $this->doAddMentor($l);

            if ($this->mentorsScheduledForDeletion and $this->mentorsScheduledForDeletion->contains($l)) {
                $this->mentorsScheduledForDeletion->remove($this->mentorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMentor $mentor The ChildMentor object to add.
     */
    protected function doAddMentor(ChildMentor $mentor)
    {
        $this->collMentors[]= $mentor;
        $mentor->setUserInfo($this);
    }

    /**
     * @param  ChildMentor $mentor The ChildMentor object to remove.
     * @return $this|ChildUserInfo The current object (for fluent API support)
     */
    public function removeMentor(ChildMentor $mentor)
    {
        if ($this->getMentors()->contains($mentor)) {
            $pos = $this->collMentors->search($mentor);
            $this->collMentors->remove($pos);
            if (null === $this->mentorsScheduledForDeletion) {
                $this->mentorsScheduledForDeletion = clone $this->collMentors;
                $this->mentorsScheduledForDeletion->clear();
            }
            $this->mentorsScheduledForDeletion[]= clone $mentor;
            $mentor->setUserInfo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserInfo is new, it will return
     * an empty collection; or if this UserInfo has previously
     * been saved, it will retrieve related Mentors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserInfo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMentor[] List of ChildMentor objects
     */
    public function getMentorsJoinCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMentorQuery::create(null, $criteria);
        $query->joinWith('Category', $joinBehavior);

        return $this->getMentors($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->phonenum = null;
        $this->address = null;
        $this->state = null;
        $this->city = null;
        $this->zipcode = null;
        $this->user_id = null;
        $this->email = null;
        $this->username = null;
        $this->password = null;
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
            if ($this->collAdministrators) {
                foreach ($this->collAdministrators as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomers) {
                foreach ($this->collCustomers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMentors) {
                foreach ($this->collMentors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAdministrators = null;
        $this->collCustomers = null;
        $this->collMentors = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserInfoTableMap::DEFAULT_STRING_FORMAT);
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
