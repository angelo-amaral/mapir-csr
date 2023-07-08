<?php

// Sample file: Never send your credentials to git

// host
$host = 'http://localhost/';

$css = 'http://localhost/mapir-csr/css';

// db
$db_name = 'amaralli_mapir_csr';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

try {
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
  throw $th;
}

/* change character set to utf8 */
if (!$conn->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $conn->error);
} /*else {
  printf("Current character set: %s\n", $conn->character_set_name());
} */
