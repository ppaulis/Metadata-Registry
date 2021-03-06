<?php

/**
 * Base static class for performing query and update operations on the 'reg_concept' table.
 *
 * 
 *
 * @package    lib.model.om
 */
abstract class BaseConceptPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'reg_concept';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Concept';

	/** The total number of columns. */
	const NUM_COLUMNS = 14;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the ID field */
	const ID = 'reg_concept.ID';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'reg_concept.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'reg_concept.UPDATED_AT';

	/** the column name for the DELETED_AT field */
	const DELETED_AT = 'reg_concept.DELETED_AT';

	/** the column name for the LAST_UPDATED field */
	const LAST_UPDATED = 'reg_concept.LAST_UPDATED';

	/** the column name for the CREATED_USER_ID field */
	const CREATED_USER_ID = 'reg_concept.CREATED_USER_ID';

	/** the column name for the UPDATED_USER_ID field */
	const UPDATED_USER_ID = 'reg_concept.UPDATED_USER_ID';

	/** the column name for the URI field */
	const URI = 'reg_concept.URI';

	/** the column name for the PREF_LABEL field */
	const PREF_LABEL = 'reg_concept.PREF_LABEL';

	/** the column name for the VOCABULARY_ID field */
	const VOCABULARY_ID = 'reg_concept.VOCABULARY_ID';

	/** the column name for the IS_TOP_CONCEPT field */
	const IS_TOP_CONCEPT = 'reg_concept.IS_TOP_CONCEPT';

	/** the column name for the PREF_LABEL_ID field */
	const PREF_LABEL_ID = 'reg_concept.PREF_LABEL_ID';

	/** the column name for the STATUS_ID field */
	const STATUS_ID = 'reg_concept.STATUS_ID';

	/** the column name for the LANGUAGE field */
	const LANGUAGE = 'reg_concept.LANGUAGE';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CreatedAt', 'UpdatedAt', 'DeletedAt', 'LastUpdated', 'CreatedUserId', 'UpdatedUserId', 'Uri', 'PrefLabel', 'VocabularyId', 'IsTopConcept', 'PrefLabelId', 'StatusId', 'Language', ),
		BasePeer::TYPE_COLNAME => array (ConceptPeer::ID, ConceptPeer::CREATED_AT, ConceptPeer::UPDATED_AT, ConceptPeer::DELETED_AT, ConceptPeer::LAST_UPDATED, ConceptPeer::CREATED_USER_ID, ConceptPeer::UPDATED_USER_ID, ConceptPeer::URI, ConceptPeer::PREF_LABEL, ConceptPeer::VOCABULARY_ID, ConceptPeer::IS_TOP_CONCEPT, ConceptPeer::PREF_LABEL_ID, ConceptPeer::STATUS_ID, ConceptPeer::LANGUAGE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'created_at', 'updated_at', 'deleted_at', 'last_updated', 'created_user_id', 'updated_user_id', 'uri', 'pref_label', 'vocabulary_id', 'is_top_concept', 'pref_label_id', 'status_id', 'language', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CreatedAt' => 1, 'UpdatedAt' => 2, 'DeletedAt' => 3, 'LastUpdated' => 4, 'CreatedUserId' => 5, 'UpdatedUserId' => 6, 'Uri' => 7, 'PrefLabel' => 8, 'VocabularyId' => 9, 'IsTopConcept' => 10, 'PrefLabelId' => 11, 'StatusId' => 12, 'Language' => 13, ),
		BasePeer::TYPE_COLNAME => array (ConceptPeer::ID => 0, ConceptPeer::CREATED_AT => 1, ConceptPeer::UPDATED_AT => 2, ConceptPeer::DELETED_AT => 3, ConceptPeer::LAST_UPDATED => 4, ConceptPeer::CREATED_USER_ID => 5, ConceptPeer::UPDATED_USER_ID => 6, ConceptPeer::URI => 7, ConceptPeer::PREF_LABEL => 8, ConceptPeer::VOCABULARY_ID => 9, ConceptPeer::IS_TOP_CONCEPT => 10, ConceptPeer::PREF_LABEL_ID => 11, ConceptPeer::STATUS_ID => 12, ConceptPeer::LANGUAGE => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'created_at' => 1, 'updated_at' => 2, 'deleted_at' => 3, 'last_updated' => 4, 'created_user_id' => 5, 'updated_user_id' => 6, 'uri' => 7, 'pref_label' => 8, 'vocabulary_id' => 9, 'is_top_concept' => 10, 'pref_label_id' => 11, 'status_id' => 12, 'language' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	/**
	 * @return     MapBuilder the map builder for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ConceptMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ConceptMapBuilder');
	}
	/**
	 * Gets a map (hash) of PHP names to DB column names.
	 *
	 * @return     array The PHP to DB name map for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @deprecated Use the getFieldNames() and translateFieldName() methods instead of this.
	 */
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ConceptPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants TYPE_PHPNAME,
	 *                         TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants TYPE_PHPNAME,
	 *                      TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. ConceptPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ConceptPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $tableAlias = null)
	{

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::ID) : ConceptPeer::ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::CREATED_AT) : ConceptPeer::CREATED_AT);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::UPDATED_AT) : ConceptPeer::UPDATED_AT);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::DELETED_AT) : ConceptPeer::DELETED_AT);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::LAST_UPDATED) : ConceptPeer::LAST_UPDATED);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::CREATED_USER_ID) : ConceptPeer::CREATED_USER_ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::UPDATED_USER_ID) : ConceptPeer::UPDATED_USER_ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::URI) : ConceptPeer::URI);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::PREF_LABEL) : ConceptPeer::PREF_LABEL);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::VOCABULARY_ID) : ConceptPeer::VOCABULARY_ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::IS_TOP_CONCEPT) : ConceptPeer::IS_TOP_CONCEPT);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::PREF_LABEL_ID) : ConceptPeer::PREF_LABEL_ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::STATUS_ID) : ConceptPeer::STATUS_ID);

        $criteria->addSelectColumn(($tableAlias) ? ConceptPeer::alias($tableAlias, ConceptPeer::LANGUAGE) : ConceptPeer::LANGUAGE);

	}

	const COUNT = 'COUNT(reg_concept.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT reg_concept.ID)';

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      Connection $con
	 * @return     Concept
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ConceptPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      Connection $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ConceptPeer::populateObjects(ConceptPeer::doSelectRS($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect()
	 * method to get a ResultSet.
	 *
	 * Use this method directly if you want to just get the resultset
	 * (instead of an array of objects).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     ResultSet The resultset object with numerically-indexed fields.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseConceptPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseConceptPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ConceptPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a Creole ResultSet, set to return
		// rows indexed numerically.
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = ConceptPeer::getOMClass();
		$cls = Propel::import($cls);
		// populate the object(s)
		while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedUserId table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinUserRelatedByCreatedUserId(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedUserId table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinUserRelatedByUpdatedUserId(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Vocabulary table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinVocabulary(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ConceptProperty table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinConceptProperty(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Status table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinStatus(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Concept objects pre-filled with their User objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUserRelatedByCreatedUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUserRelatedByCreatedUserId(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addConceptRelatedByCreatedUserId($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initConceptsRelatedByCreatedUserId();
				$obj2->addConceptRelatedByCreatedUserId($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with their User objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUserRelatedByUpdatedUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUserRelatedByUpdatedUserId(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addConceptRelatedByUpdatedUserId($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initConceptsRelatedByUpdatedUserId();
				$obj2->addConceptRelatedByUpdatedUserId($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with their Vocabulary objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinVocabulary(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VocabularyPeer::addSelectColumns($c);

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VocabularyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getVocabulary(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addConcept($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initConcepts();
				$obj2->addConcept($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with their ConceptProperty objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinConceptProperty(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ConceptPropertyPeer::addSelectColumns($c);

		$c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ConceptPropertyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getConceptProperty(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addConcept($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initConcepts();
				$obj2->addConcept($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with their Status objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		StatusPeer::addSelectColumns($c);

		$c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = StatusPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getStatus(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addConcept($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initConcepts();
				$obj2->addConcept($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c, 'a1');
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

        $c->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::alias('a1', UserPeer::ID));
        $c->addAlias('a1', UserPeer::TABLE_NAME);

		UserPeer::addSelectColumns($c, 'a2');
		$startcol4 = $startcol3 + UserPeer::NUM_COLUMNS;

        $c->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::alias('a2', UserPeer::ID));
        $c->addAlias('a2', UserPeer::TABLE_NAME);

		VocabularyPeer::addSelectColumns($c, 'a3');
		$startcol5 = $startcol4 + VocabularyPeer::NUM_COLUMNS;

        $c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::alias('a3', VocabularyPeer::ID));
        $c->addAlias('a3', VocabularyPeer::TABLE_NAME);

		ConceptPropertyPeer::addSelectColumns($c, 'a4');
		$startcol6 = $startcol5 + ConceptPropertyPeer::NUM_COLUMNS;

        $c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::alias('a4', ConceptPropertyPeer::ID));
        $c->addAlias('a4', ConceptPropertyPeer::TABLE_NAME);

		StatusPeer::addSelectColumns($c, 'a5');
		$startcol7 = $startcol6 + StatusPeer::NUM_COLUMNS;

        $c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::alias('a5', StatusPeer::ID));
        $c->addAlias('a5', StatusPeer::TABLE_NAME);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


				// Add objects for joined User rows
	
			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUserRelatedByCreatedUserId(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConceptRelatedByCreatedUserId($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj2->initConceptsRelatedByCreatedUserId();
				$obj2->addConceptRelatedByCreatedUserId($obj1);
			}


				// Add objects for joined User rows
	
			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUserRelatedByUpdatedUserId(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConceptRelatedByUpdatedUserId($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj3->initConceptsRelatedByUpdatedUserId();
				$obj3->addConceptRelatedByUpdatedUserId($obj1);
			}


				// Add objects for joined Vocabulary rows
	
			$omClass = VocabularyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVocabulary(); // CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}


				// Add objects for joined ConceptProperty rows
	
			$omClass = ConceptPropertyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptProperty(); // CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addConcept($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj5->initConcepts();
				$obj5->addConcept($obj1);
			}


				// Add objects for joined Status rows
	
			$omClass = StatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getStatus(); // CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addConcept($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj6->initConcepts();
				$obj6->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedUserId table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUserRelatedByCreatedUserId(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedUserId table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUserRelatedByUpdatedUserId(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Vocabulary table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptVocabulary(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ConceptProperty table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptConceptProperty(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$criteria->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Status table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptStatus(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConceptPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConceptPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$criteria->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$criteria->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$rs = ConceptPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects except UserRelatedByCreatedUserId.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUserRelatedByCreatedUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VocabularyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VocabularyPeer::NUM_COLUMNS;

		ConceptPropertyPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptPropertyPeer::NUM_COLUMNS;

		StatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + StatusPeer::NUM_COLUMNS;

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VocabularyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVocabulary(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initConcepts();
				$obj2->addConcept($obj1);
			}

			$omClass = ConceptPropertyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConceptProperty(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initConcepts();
				$obj3->addConcept($obj1);
			}

			$omClass = StatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getStatus(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects except UserRelatedByUpdatedUserId.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUserRelatedByUpdatedUserId(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VocabularyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VocabularyPeer::NUM_COLUMNS;

		ConceptPropertyPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptPropertyPeer::NUM_COLUMNS;

		StatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + StatusPeer::NUM_COLUMNS;

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VocabularyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVocabulary(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initConcepts();
				$obj2->addConcept($obj1);
			}

			$omClass = ConceptPropertyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConceptProperty(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initConcepts();
				$obj3->addConcept($obj1);
			}

			$omClass = StatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getStatus(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects except Vocabulary.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptVocabulary(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		UserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UserPeer::NUM_COLUMNS;

		ConceptPropertyPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ConceptPropertyPeer::NUM_COLUMNS;

		StatusPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + StatusPeer::NUM_COLUMNS;

		$c->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);

		$c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUserRelatedByCreatedUserId(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConceptRelatedByCreatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initConceptsRelatedByCreatedUserId();
				$obj2->addConceptRelatedByCreatedUserId($obj1);
			}

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUserRelatedByUpdatedUserId(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConceptRelatedByUpdatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initConceptsRelatedByUpdatedUserId();
				$obj3->addConceptRelatedByUpdatedUserId($obj1);
			}

			$omClass = ConceptPropertyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getConceptProperty(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}

			$omClass = StatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getStatus(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initConcepts();
				$obj5->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects except ConceptProperty.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptConceptProperty(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		UserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UserPeer::NUM_COLUMNS;

		VocabularyPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VocabularyPeer::NUM_COLUMNS;

		StatusPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + StatusPeer::NUM_COLUMNS;

		$c->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$c->addJoin(ConceptPeer::STATUS_ID, StatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUserRelatedByCreatedUserId(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConceptRelatedByCreatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initConceptsRelatedByCreatedUserId();
				$obj2->addConceptRelatedByCreatedUserId($obj1);
			}

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUserRelatedByUpdatedUserId(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConceptRelatedByUpdatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initConceptsRelatedByUpdatedUserId();
				$obj3->addConceptRelatedByUpdatedUserId($obj1);
			}

			$omClass = VocabularyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVocabulary(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}

			$omClass = StatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getStatus(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initConcepts();
				$obj5->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Concept objects pre-filled with all related objects except Status.
	 *
	 * @return array Array of Concept objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ConceptPeer::addSelectColumns($c);
		$startcol2 = (ConceptPeer::NUM_COLUMNS - ConceptPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		UserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UserPeer::NUM_COLUMNS;

		VocabularyPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VocabularyPeer::NUM_COLUMNS;

		ConceptPropertyPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ConceptPropertyPeer::NUM_COLUMNS;

		$c->addJoin(ConceptPeer::CREATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::UPDATED_USER_ID, UserPeer::ID);

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);

		$c->addJoin(ConceptPeer::PREF_LABEL_ID, ConceptPropertyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ConceptPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUserRelatedByCreatedUserId(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addConceptRelatedByCreatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initConceptsRelatedByCreatedUserId();
				$obj2->addConceptRelatedByCreatedUserId($obj1);
			}

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUserRelatedByUpdatedUserId(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addConceptRelatedByUpdatedUserId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initConceptsRelatedByUpdatedUserId();
				$obj3->addConceptRelatedByUpdatedUserId($obj1);
			}

			$omClass = VocabularyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVocabulary(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initConcepts();
				$obj4->addConcept($obj1);
			}

			$omClass = ConceptPropertyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptProperty(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addConcept($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initConcepts();
				$obj5->addConcept($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return ConceptPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a Concept or Criteria object.
	 *
	 * @param      mixed $values Criteria or Concept object containing data that is used to create the INSERT statement.
	 * @param      Connection $con the connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseConceptPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseConceptPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Concept object
		}

		$criteria->remove(ConceptPeer::ID); // remove pkey col since this table uses auto-increment


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseConceptPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseConceptPeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a Concept or Criteria object.
	 *
	 * @param      mixed $values Criteria or Concept object containing data that is used to create the UPDATE statement.
	 * @param      Connection $con The connection to use (specify Connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseConceptPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseConceptPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ConceptPeer::ID);
			$selectCriteria->add(ConceptPeer::ID, $criteria->remove(ConceptPeer::ID), $comparison);

		} else { // $values is Concept object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseConceptPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseConceptPeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the reg_concept table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ConceptPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Concept or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Concept object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      Connection $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ConceptPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof Concept) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ConceptPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Concept object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Concept $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Concept $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ConceptPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ConceptPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ConceptPeer::DATABASE_NAME, ConceptPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ConceptPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      mixed $pk the primary key.
	 * @param      Connection $con the connection to use
	 * @return     Concept
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ConceptPeer::DATABASE_NAME);

		$criteria->add(ConceptPeer::ID, $pk);


		$v = ConceptPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ConceptPeer::ID, $pks, Criteria::IN);
			$objs = ConceptPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseConceptPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseConceptPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'lib/model/map/ConceptMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ConceptMapBuilder');
}
