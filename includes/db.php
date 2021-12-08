<?php
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_address'] = 'localhost';
$db['db_name'] = 'cms';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$data = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS, DB_NAME);

// if (isset($data)) {
//     echo 'DB connected';
// }
