<?php
namespace phputil\datatables;

use phputil\traits\FromArray;

/**
 * DataTables Request.
 *
 * @author	Thiago Delgado Pinto
 * @see		https://datatables.net/manual/server-side#Sent-parameters 
 */
class DataTablesRequest {

	use FromArray {
		fromArray as private attributesFromArray;
	}

	/** @var integer */
	public $draw = 0;
	/** @var integer */
	public $start = 0;
	/** @var integer */
	public $length = 10;
	/** @var array */
	public $columns = array();
	/** @var array */
	public $search = array();
	/** @var array */
	public $order = array();
	
	/**
	 * Constructor
	 *
	 * @param array $request	Request array. OPTIONAL.
	 * @return object			New instance.
	 */
	public function __construct( array $request = array() ) {
		if ( count( $request ) > 0 ) {
			$this->fromArray( $request );
		}
	}

	/**
	 * Retrieve values from an array.
	 *
	 * @param array $a	Input array.
	 * @return object	Reference to $this.
	 */
	public function fromArray( array $a ) {

		$this->attributesFromArray( $a );

		$this->draw = intval( $this->draw );
		$this->start = intval( $this->start );
		$this->length = intval( $this->length );

		// Columns
		$newColumns = array();
		foreach ( $this->columns as $col ) {
			$c = new RequestColumn();
			$c->fromArray( $col );

			// Column search
			$s = new RequestSearch();
			$s->fromArray( $c->search );
			$c->search = $s;

			$newColumns []= $c;
		}
		$this->columns = $newColumns;

		// Search
		$s = new RequestSearch();
		$s->fromArray( $this->search );
		$this->search = $s;

		// Order
		$newOrder = array();
		foreach ( $this->order as $ord ) {
			$o = new RequestOrder();
			$o->fromArray( $ord );
			$newOrder []= $o;
		}
		$this->order = $newOrder;

		return $this;
	}

	/**
	 * Return the search value.
	 *
	 * @return string | null
	 */
	function searchValue() {
		return isset( $this->search ) ? $this->search->value : null;
	}


	/**
	 * Return column search values.
	 *
	 * Example:
	 *		array( 'name' => 'Bob', age='21' )
	 *
	 * @return array
	 */
	public function columnSearch() {
		$s = array();
		foreach ( $this->columns as $col ) {
			if ( isset( $col->search, $col->data ) ) {
				$s[ $col->data ]= $col->search->value;
			}
		}
		return $s;
	}	


	/**
	 * Return the columns with ordering and and their order direction.
	 *
	 * Example:
	 *		array( 'name' => 'ASC', 'age' => 'DESC' );
	 *
	 * @return array
	 */
	public function columnOrder() {
		$o = array();
		foreach ( $this->order as $ord ) {
			$colIndex = $ord->column;
			if ( ! isset( $this->columns[ $colIndex ] ) ) {
				continue;
			}
			$col = $this->columns[ $colIndex ];
			$data = $col->data; // "name"
			if ( ! isset( $data ) ) {
				continue;
			}
			$o[ $data ] = mb_strtoupper( $ord->dir );
		}
		return $o;
	}

}

?>