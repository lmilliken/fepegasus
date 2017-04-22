<?php
/*
    Purpose: Methods to connect to and execute queries on the Team113 Database
    Author: Team 113
    Date: March 2017
*/

// function to connect to the database

//$dbcon = mysqli_connect($hostName, $uName, $pWord, $db);

    // $myPDO = new PDO("mysql:host=108.167.180.118;dbname=millifly_feapply", 'millifly_feadmin', 'bLs0Mghpns(');

    //     if(!$myPDO){
    //         die("Failed to connect");
    //     }

    //     echo "Connection successful"

//<9sQ4*Ps4
function dbConnect(){
    $serverName = 'gator4186.hostgator.com';
    $uName = 'millifly_feuser';
    $pWord = '<9sQ4*Ps4';
    $db = 'millifly_feapply';

    $myPDO = new PDO("mysql:host=$serverName;dbname=$db", $uName, $pWord);

        if(!$myPDO){
            die("Failed to connect");
        }

        echo "Connection successful";

}
dbConnect();




?>