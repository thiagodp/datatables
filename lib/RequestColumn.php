<?php
namespace phputil\datatables;

use phputil\traits\FromArray;

/**
 * Datatables request column.
 *
 * @author	Thiago Delgado Pinto
 * @see		https://datatables.net/manual/server-side#Sent-parameters 
 */
class RequestColumn {

    use FromArray;

    /** @var string */
    public $data = null;
    /** @var string */
    public $name = null;
    /** @var bool */
    public $searchable = false;
    /** @var bool */
    public $orderable = false;
    /** @var array */
    public $search = array();
}

?>