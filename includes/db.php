<?php
  $db['db_server'] = 'localhost';
  $db['db_user'] = 'root';
  $db['db_pass'] = '';
  $db['db_name']= 'cms';

// $db equal to $key ($db as $key)
  foreach($db as $key => $value){
    define(strtoupper($key), $value);
  }

  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

  if ($link == false) {
    die("Connection Error". mysqli_error($link));
  }
?>
