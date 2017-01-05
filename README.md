# Datatables

PHP representation of [Datatables](https://datatables.net)' request and response.

Main files: 
* Class [DataTablesRequest](https://github.com/thiagodp/datatables/blob/master/lib/DataTablesRequest.php)
* Class [DataTablesResponse](https://github.com/thiagodp/datatables/blob/master/lib/DataTablesResponse.php)

This project uses [semantic versioning](http://semver.org/). See our [releases](https://github.com/thiagodp/datatables/releases).

### Installation

```command
composer require phputil/datatables
```

### Example on version `2.x`

```php
<?php
require_once 'vendor/autoload.php';

use phputil\datatables\DataTablesRequest;
use phputil\datatables\DataTablesResponse;

//
// REQUEST
//
$req = new DataTablesRequest( $_POST );

// PAGINATION
$offset = $req->start;
$limit = $req->length;

// SEARCH
$searchValue = $req->searchValue(); // Example: 'Alice'

// FILTERING
$search = $req->columnSearch(); // Example: array( 'name' => 'Bob', 'age' => 21 )

// SORTING
$order = $req->columnOrder(); // Example: array( 'name' => 'ASC', 'age' => 'DESC' )

...

//
// RESPONSE
//
$totalCount = /* total number of records to return */
$filteredCount = /* filtered number of records to return */
$data = /* items to return */
$draw = $req->draw; // From the request

$res = new DataTablesResponse(
	$totalCount, $filteredCount, $data, $draw );
	
echo json_encode( $res );
?>
```


### Example on version `1.x`

```php
<?php
require_once 'vendor/autoload.php';

use phputil\DataTablesRequest;
use phputil\DataTablesResponse;

//
// REQUEST
//
$req = new DataTablesRequest( $_POST );

// PAGINATION
$limit = $req->limit();
$offset = $req->offset();

// SEARCH
$search = $req->search(); // null in case of not having search

// FILTERING
$filters = $req->filters(); // Example: array( 'name' => 'Bob', 'age' => 21 )

// SORTING
//	Originally, Datatables returns the sort order
//	by column index, but here you can get it using
//	your own column names.
$orders = $req->orders( array( 'name', 'age' ) ); // Example: array( 'name' => 'asc', 'age' => 'desc' )

...

//
// RESPONSE
//
$totalCount = /* total number of records to return */
$filteredCount = /* filtered number of records to return */
$data = /* items to return */
$draw = $req->draw(); // From the request

$res = new DataTablesResponse(
	$totalCount, $filteredCount, $data, $draw );
	
echo json_encode( $res );
?>
```
