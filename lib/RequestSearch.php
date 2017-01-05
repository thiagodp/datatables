<?php
namespace phputil\datatables;

use phputil\traits\FromArray;

/**
 * Datatables request search.
 *
 * @author	Thiago Delgado Pinto
 * @see		https://datatables.net/manual/server-side#Sent-parameters 
 */
class RequestSearch {

	use FromArray;
    
    /** @var string */
    public $value = '';
    /** @var bool */
    public $regex = false;

    public function __construct( $value = '', $regex = false ) {
        $this->value = $value;
        $this->regex = $regex;
    }
}

?>