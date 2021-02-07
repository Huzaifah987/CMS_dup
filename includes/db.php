<?php
  $db['servername'] = 'localhost';
  $db['username'] = 'root';
  $db['password'] = '';
  $db['name'] = 'CMS_dup';

  foreach ($db as $key => $value) {
    define(strtoupper($key),$value);
  }

  $link = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,NAME);

 ?>
