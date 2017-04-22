<?php
/*
    Purpose: Methods to connect to and execute queries
    Author: Laurel Milliken
    Date: April 2017
*/

// function to connect to the database
function dbConnect(){
    $serverName = 'gator4186.hostgator.com';
    $uName = 'millifly_feuser';
    $pWord = '<9sQ4*Ps4';
    $db = 'millifly_feapply';

    try{$connPDO = new PDO("mysql:host=$serverName;dbname=$db", $uName, $pWord);}
    catch (PDOException $error)
    {
        die('Connection failed:'.$error->getMessage());
    }

    return $connPDO;
    // $connPDO = new PDO("mysql:host=$serverName;dbname=$db", $uName, $pWord);

    //     if(!$myPDO){
    //         die("Failed to connect");
    //     }

    //     echo "Connection successful";

}


//method to execute a query - the SQL statement to be executed, is passed to it

function executeQuery($query)
{
    // call the dbConnect function

    $conn = dbConnect();

    try
    {
        // execute query and assign results to a PDOStatement object

        $stmt = $conn->query($query);

        if ($stmt->columnCount() > 0)  // if rows with columns are returned
            {

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retreive the rows as an associative array
                            
            }

//Uncomment these 4 lines to display $results
       
       // echo '<pre style="font-size:large">';
       // print_r($results);
       // echo '</pre>';
       // die;
       
//call dbDisconnect() method to close the connection

        dbDisconnect($conn);

        return $results;
    }
    catch (PDOException $e)
    {
        //if execution fails

        dbDisconnect($conn);
        die ('Query failed: ' . $e->getMessage());
    }
}

function getProposals()
{
    $query = <<<STR
Select *
From pegasusapplications
Order by lastname
STR;

    return executeQuery($query);
}

function dbDisconnect($conn)
{
    // closes the specfied connection and releases associated resources

    $conn = null;
}
?>