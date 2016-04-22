<?php
namespace phputil;
 
/**
 * Response format used by DataTables.
 *
 * @author	Thiago Delgado Pinto
 *
 * @see		https://datatables.net/manual/server-side#Returned-data
 */
class DataTablesResponse {
	
	private $draw = 0;				// Asynchronous sequence call
	private $recordsTotal = 0;		// Total records
	private $recordsFiltered = 0;	// Total filtered records
	private $data = array();		// Data
	private $error = null;			// Error message (if occurred)
	
	function __construct( $recordsTotal, $recordsFiltered, $data, $draw = 0, $error = null ) {
		$this->recordsTotal = $recordsTotal;
		$this->recordsFiltered = $recordsFiltered;
		$this->data = $data;
		$this->draw = $draw;
		$this->error = $error;
	}
	
	function getRecordsTotal() { return $this->recordsTotal; }
	function getRecordsFiltered() { return $this->recordsFiltered; }
	function getData() { return $this->data; }
	function getDraw() { return $this->draw; }
	function getError() { return $this->error; }
}

?>