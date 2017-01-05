<?php
namespace phputil\datatables;

use phputil\traits\FromArray;

/**
 * Datatables request order.
 *
 * @author	Thiago Delgado Pinto
 * @see		https://datatables.net/manual/server-side#Sent-parameters 
 */
class RequestOrder {

    use FromArray {
		fromArray as private attributesFromArray;
	}
    
    /** @var integer Column index */
    public $column = 0;
    /** @var string Order direction: "asc" or "desc" */
    public $dir = 'asc';


    public function __construct( $column = 0, $dir = 'asc' ) {
        $this->column = $column;
        $this->dir = $dir;
    }

    /**
     * Fill attribute values from an array.
     *
     * @param array $a  Input array.
     * @return object   Reference to $this.
     */
    public function fromArray( array $a ) {
        $this->attributesFromArray( $a );
        $this->column = intval( $this->column );
        return $this;    
    }    
}

?>