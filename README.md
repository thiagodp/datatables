# Datatables

PHP representation of [Datatables](https://datatables.net)' request and response.

Main files: 
* Class [phputil\DataTablesRequest](https://github.com/thiagodp/datatables/blob/master/lib/DataTablesRequest.php)
* Class [phputil\DataTablesResponse](https://github.com/thiagodp/datatables/blob/master/lib/DataTablesResponse.php)

This project uses [semantic versioning](http://semver.org/).

### Installation

```command
composer require phputil/datatables
```

### Example

```php
<?php
require_once 'vendor/autoload.php';
use phputil\DataTablesRequest;

$dataSentByDatatablesViaPost = $_POST;
$dtr = new DataTablesRequest( $dataSentByDatatablesViaPost );

// PAGINATION
$limit = $dtr->limit();
$offset = $dtr->offset();

// SEARCHING
$search = $dtr->search(); // null in case of not having search

// FILTERING
//	Let's say that we have two filters in the client side:
//	"id", and "name". So..

$filters = $dtr->filters();
$idFilter = isset( $filters[ 'id' ] ) ? $filters[ 'id' ] : null;
$nameFilter = isset( $filters[ 'name' ] ) ? $filters[ 'name' ] : null;

// SORTING
//	Originally, Datatables returns the sort order
//	by column index, but here you can get it using
//	your own column names.
$orders = $dtr->orders( array( 'id', 'name' ) );
$idOrder = isset( $orders[ 'id' ] ) ? $orders[ 'id' ] : null;
$nameOrder = isset( $orders[ 'name' ] ) ? $orders[ 'name' ] : null;
var_dump( $idOrder ); // null, that means "not ordered by id"
var_dump( $nameOrder ); // string("asc")
?>
```