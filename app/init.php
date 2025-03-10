<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = 'shop_online';
$port = 8889;

$Database = mysqli_connect($servername, $username, $password, $dbName, $port);


if (!$Database) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set('display error', 1);

define('SITE_NAME', 'Online Store');
define('SITE_PATH', 'http://localhost:8888/');
define('IMAGE_PATH', 'resources/images/');

include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_cart.php');
include('app/models/m_products.php');

$Template = new Template();
$Categories = new Categories($Database);
$Products = new Products($Database);
$Cart = new Cart($Database);

session_start();