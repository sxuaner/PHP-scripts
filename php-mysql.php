<?php

/*  This program simply connects to mysql and fecth data from user@test (tablen@dabase)
    With mysql_connect() deprecated. Use PDO instead.
    However, error infomation during debugging was not show in STDOUT. Find out why
    The failuer was caused by wrong query "select * from sx". sx was the wrong table name instead of user.
    
    How to print out database query result??

*/

// db creadentials
$dbhost = "localhost";
$dbuser = "sx";
$dbpass = "songxuan";
$dbname = "test";
$table = "user";

$query = "SELECT * FROM sx";
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
        // Please note that at this point, the connection has been successfully made. If PDO_statements is FALSE, it means it has failed to fetch data
        // PDO::query() returns a PDOStatement object, or FALSE on failure. 
        echo "Failed to fetch data\n";
    } 
    // close a db conn
    $PDO_statements = null;
    $dblink = null;

}catch(PDOException $e){
    print "Error!!";
    print $e->getMessage();
    print $e->getTrace();
    print $e->getCode();
    die();
}
?>