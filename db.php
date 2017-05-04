<?php
/*
    Purpose: Methods to connect to and execute queries
    Author: Laurel Milliken
    Date: April 2017
*/



require_once ("fePegasusDBconn.php");

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


function submitReview($query)
{
    // call the dbConnect function

    $conn = dbConnect();

    $conn->query($query);
    // if ($conn->query($query) ===TRUE){
    //     echo "this is working";
    //     } else
    //     {echo "Failed: " . "query" . "<br>" ."failed";            }

    dbDisconnect($conn);    
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