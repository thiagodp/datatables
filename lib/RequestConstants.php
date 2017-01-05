<?php
namespace phputil\datatables;

/**
 * Datatables request constants.
 *
 * @author	Thiago Delgado Pinto
 * @see		https://datatables.net/manual/server-side#Sent-parameters 
 */
interface RequestConstants {

    const DRAW = 'draw'; // integer
	const START = 'start'; // integer    
	const LENGTH = 'length'; // integer
	// SEARCH
	const SEARCH = 'search'; // array
	const SEARCH_VALUE = 'value'; // string
	const SEARCH_REGEX = 'regex'; // bool
	// COLUMNS
	const COLUMNS = 'columns'; // array
	const COLUMNS_DATA = 'data'; // string, column name
	const COLUMNS_NAME = 'name'; // string, unused
	const COLUMNS_SEARCHABLE = 'searchable'; // bool, unused
	const COLUMNS_ORDERABLE = 'orderable'; // bool, unused
	const COLUMNS_SEARCH = 'search'; // array
	const COLUMNS_SEARCH_VALUE = 'value'; // string
	const COLUMNS_SEARCH_REGEX = 'regex'; // bool
	// ORDER
	const ORDER = 'order'; // array
	const ORDER_COLUMN_INDEX = 'column'; // integer
	const ORDER_DIRECTION = 'dir'; // string, "asc" or "desc"

}