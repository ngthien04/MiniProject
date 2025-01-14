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

define('SITE_NAME', 'Online Store');
define('SITE_PATH', 'http://localhost:8888/');
define('IMAGE_PATH', 'resources/images/');

include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_products.php');
include('app/models/m_cart.php');

session_start();