<?php

/*  This program simply connects to mysql and fecth data from user@test (tablen@dabase)
    With mysql_connect() deprecated. Use PDO instead.
    However, error infomation during debugging was not show in STDOUT. Find out why
*/

// db creadentials
$dbhost = "localhost";
$dbuser = "sx";
$dbpass = "songxuan";
$dbname = "test";
$table = "user";

$query = "SELECT * FROM user";
try{

    $dblink = new PDO('mysql:host=localhost;dbname=test',$dbuser,$dbpass);
    $PDO_statements = $dblink->query($query);
    if($PDO_statements !== FALSE ){
        foreach( $PDO_statements as $row){
            print_r($row["id"] . "\n");
            print_r($row["name"]. "\n");
        }
    }
    else{
        echo "Connection failed\n";
    }
    // close a db conn
    $PDO_statements = null;
    $dblink = null;

}catch(PDOException $e){
    print $e->getMessage();
    die();
}
?>