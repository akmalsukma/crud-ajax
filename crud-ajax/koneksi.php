<?php 

    define('HOST' , 'localhost');
    define('USER' , 'root');
    define('PASS' , '');
    define('DB' , 'crud_java');

    $db = new mysqli(HOST,USER,PASS, DB);


    if ($db->connect_error) {
        die('Connection Failed : ' .$conn->connect_error);
    }



?>


