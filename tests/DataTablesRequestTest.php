<?php
namespace phputil\datatables\test;

require_once 'vendor/autoload.php';

use \PHPUnit_Framework_TestCase;
use \phputil\datatables\DataTablesRequest;

/**
 * Tests DataTablesRequest
 *
 * @author Thiago Delgado Pinto
 */
class DataTablesRequestTest extends PHPUnit_Framework_TestCase {

    private $req;

    function __construct() {
        $this->req = array(
            'draw' => 1,
            'start' => 2,
            'length' => 3,
            'columns' => array(
                array(
                    'name' => '',
                    'data' => 'name',
                    'searchable' => true,
                    'orderable' => true,
                    'search' => array(
                        'value' => 'Bob',
                        'regex' => false
                    )
                ),
                array(
                    'name' => '',
                    'data' => 'age',
                    'searchable' => true,
                    'orderable' => true,
                    'search' => array(
                        'value' => '21',
                        'regex' => false
                    )
                )
            ),
            'search' => array(
                'value' => 'hello',
                'regex' => false
            ),
            'order' => array(
                array( 'column' => 0, 'dir' => 'asc' ),
                array( 'column' => 1, 'dir' => 'desc' )
            )
        );
    }

    function test_can_create_request() {
        $dtr = ( new DataTablesRequest() )->fromArray( $this->req );
        $this->assertEquals( 1, $dtr->draw );
        $this->assertEquals( 2, $dtr->start );
        $this->assertEquals( 3, $dtr->length );

        $this->assertEquals( 2, count( $dtr->columns ) );

        $this->assertEquals( 'hello', $dtr->search->value );
        $this->assertEquals( false, $dtr->search->regex );

        $this->assertEquals( 2, count( $dtr->order ) );
    }

    function test_return_search_value() {
        $dtr = ( new DataTablesRequest() )->fromArray( $this->req );
        $this->assertEquals( 'hello', $dtr->searchValue() );
    }

    function test_return_column_search() {
        $dtr = ( new DataTablesRequest() )->fromArray( $this->req );
        $this->assertEquals( array( 'name' => 'Bob', 'age' => 21 ),
            $dtr->columnSearch() );
    }

    function test_return_column_order() {
        $dtr = ( new DataTablesRequest() )->fromArray( $this->req );
        $this->assertEquals( array( 'name' => 'ASC', 'age' => 'DESC' ),
            $dtr->columnOrder() );
    }    

}